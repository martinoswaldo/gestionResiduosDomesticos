<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
class ReportController extends Controller
{
    public function userReport()
    {
        $collections = Collection::where('user_id', Auth::id())->orderBy('scheduled_date')->get();
        return view('reports.user', compact('collections'));
    }

    public function downloadUserReportPdf()
    {
        $collections = Collection::where('user_id', Auth::id())->orderBy('scheduled_date')->get();
        $pdf = PDF::loadView('reports.pdf_user', compact('collections'));
        return $pdf->download('mis_recolecciones.pdf');
    }


    public function adminReport(Request $request)
    {
        $query = Collection::query();

        if ($request->filled('localidad')) {
            $query->where('location', $request->localidad);
        }

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('scheduled_date', [$request->fecha_inicio, $request->fecha_fin]);
        }

        $collections = $query->get()->groupBy('type');

        return view('reports.admin', compact('collections'));
    }

    public function downloadAdminReportPdf(Request $request)
    {
        // reutilizar lógica
        $query = Collection::query();

        if ($request->filled('localidad')) {
            $query->where('location', $request->localidad);
        }

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('scheduled_date', [$request->fecha_inicio, $request->fecha_fin]);
        }

        $collections = $query->get()->groupBy('type');

        $pdf = PDF::loadView('reports.pdf_admin', compact('collections'));
        return $pdf->download('reporte_general.pdf');
    }
}