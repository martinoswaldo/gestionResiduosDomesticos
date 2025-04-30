<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::where('user_id', auth()->id())
        ->orderBy('scheduled_date', 'asc')
        ->get();

    $timeSlots = [
        '08:00-10:00' => 'Orgánico',
        '10:00-12:00' => 'Reciclable',
        '14:00-16:00' => 'No reciclable',
        '16:00-18:00' => 'Mixto',
    ];

    $now = Carbon::now();
    $availableDate = Carbon::today();
    $futureSlots = [];

    foreach ($timeSlots as $slot => $type) {
        [$start] = explode('-', $slot);
        $slotStart = Carbon::createFromFormat('H:i', $start)->setDateFrom($now);

        // si la hora del slot ya pasó, lo omitimos
        if ($slotStart->isAfter($now)) {
            $futureSlots[] = [
                'date' => $availableDate->format('Y-m-d'),
                'time' => $slot,
                'type' => $type
            ];
        }
    }

    // Si no quedan slots para hoy, pasamos al día siguiente
    if (empty($futureSlots)) {
        $availableDate = Carbon::tomorrow();
        foreach ($timeSlots as $slot => $type) {
            $futureSlots[] = [
                'date' => $availableDate->format('Y-m-d'),
                'time' => $slot,
                'type' => $type
            ];
        }
    }

    return view('home', compact('collections', 'futureSlots'));
    }

    public function create()
    {
        return view('collections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:inorganico,peligroso,organicos',
            'collection_date' => [
                'required',
                'date',
                'after_or_equal:' . now()->format('Y-m-d') // Use current date
            ],
            'collection_time' => 'required',
        ]);
        dd($request->collection_date);
        
        $collectionDate = Carbon::parse($validated['collection_date'])->format('Y-m-d');
        
        Collection::create([
            'user_id' => Auth::id(),
            'type' => $validated['type'],
            'time' => $validated['collection_time'],
            'scheduled_date' => $collectionDate,
            'status' => 'pendiente',
            'location' => $validated['location'] ?? '',
        ]);
        return redirect()->route('home')->with('status', 'Recolección solicitada exitosamente.');    }
}