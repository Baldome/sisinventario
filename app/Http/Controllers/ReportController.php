<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Loan;
use App\Models\Setting;
use App\Models\Tool;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportController extends BaseController
{

    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('can:reportes')->only('index');
    }

    public function index()
    {
        return view('admin.reports.index');
    }

    public function generateReportAsset()
    {
        $settings = Setting::latest()->first();
        $user = Auth::user();
        $assets = Asset::with('category', 'location', 'user', 'state')->where('user_id', $user->id)->get();

        // Habilitar la opción para cargar imágenes remotas
        $pdfOptions = [
            'isRemoteEnabled' => true,
        ];

        // Cargar la vista y aplicar la configuración
        $pdf = FacadePdf::loadView('admin.reports.report-assets', compact('settings', 'assets'));

        return $pdf->stream();
    }

    public function generateReportTool()
    {
        $settings = Setting::latest()->first();
        $user = Auth::user();
        $tools = Tool::with('category', 'location', 'user', 'state', 'unit')->where('user_id', $user->id)->get();

        // Habilitar la opción para cargar imágenes remotas
        $pdfOptions = [
            'isRemoteEnabled' => true,
        ];

        // Cargar la vista y aplicar la configuración
        $pdf = FacadePdf::loadView('admin.reports.report-tools', compact('settings', 'tools'));

        return $pdf->stream();
    }

    public function generateReportForDates(Request $request)
    {
        // Validar las fechas
        $request->validate([
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ]);

        // Obtener las fechas de inicio y fin desde el request
        $startDate = $request->input('fechaInicio');
        $endDate = $request->input('fechaFin');

        // Obtener la configuración de la empresa (por ejemplo, nombre, logo, etc.)
        $settings = Setting::latest()->first();

        // Consultar los préstamos dentro del rango de fechas
        $loans = Loan::with('tool', 'user', 'tool.category', 'tool.location', 'tool.state')
            ->whereBetween('date_time_loan', [$startDate, $endDate])
            ->get();

        // Generar el PDF con la vista y los datos filtrados
        $pdf = FacadePdf::loadView('admin.reports.report-loans-by-date', compact('settings', 'loans', 'startDate', 'endDate'));

        // Retornar el PDF para ser descargado o visto en el navegador
        return $pdf->stream('reporte-herramientas-' . $startDate . '-al-' . $endDate . '.pdf');
    }

    public function generateReportLoan() {
        // Obtener la lista de préstamos
        $loans = Loan::with('tool', 'user', 'tool.category', 'tool.location', 'tool.state')->get();

        // Obtener la configuración de la empresa (por ejemplo, nombre, logo, etc.)
        $settings = Setting::latest()->first();

        // Generar el PDF con la vista y los datos
        $pdf = FacadePdf::loadView('admin.reports.report-loans', compact('settings', 'loans'));

        // Retornar el PDF para ser descargado o visto en el navegador
        return $pdf->stream('reporte-prestamos.pdf');
    }
}
