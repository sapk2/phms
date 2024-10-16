<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Patient;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    // Method to generate and save a Patient Report
    public function generatePatientReport($patientId)
    {
        // Fetch patient data with prescriptions and details
        $patient = Patient::with('prescriptions.prescriptionDetails.medication')->findOrFail($patientId);

        // Generate PDF from the Blade view
        $pdf = Pdf::loadView('reports.patient_pdf', compact('patient'));

        // Define the file path where the PDF will be saved
        $fileName = 'patient_report_' . $patient->id . '_' . now()->format('YmdHis') . '.pdf';
        $filePath = 'reports/' . $fileName;

        // Save PDF to the storage (public disk)
        Storage::disk('public')->put($filePath, $pdf->output());

        // Store report details in the database
        $report = Report::create([
            'report_type' => 'patient',
            'patient_id' => $patient->id,
            'generated_at' => now(),
            'file_path' => $filePath,
        ]);

        // Return response or download link
        return response()->json([
            'message' => 'Patient report generated successfully!',
            'file_path' => asset('storage/' . $filePath)
        ]);
    }

    // Method to generate and save Sales Report (example)
    public function generateSalesReport(Request $request)
    {
        // You would add logic here to query sales data based on request filters (e.g., date range)
        // For simplicity, we'll just mock some data and generate a report

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Fetch sales data for the report (mocked example)
        $salesData = [
            ['date' => '2024-10-01', 'medication' => 'Med A', 'quantity' => 10, 'total' => 100],
            ['date' => '2024-10-02', 'medication' => 'Med B', 'quantity' => 5, 'total' => 50],
            // more sales data...
        ];

        // Generate PDF from Blade view (for sales)
        $pdf = Pdf::loadView('reports.sales_pdf', compact('salesData', 'startDate', 'endDate'));

        // Define file path and save the PDF
        $fileName = 'sales_report_' . now()->format('YmdHis') . '.pdf';
        $filePath = 'reports/' . $fileName;
        Storage::disk('public')->put($filePath, $pdf->output());

        // Store report in the database
        $report = Report::create([
            'report_type' => 'sales',
            'start_date' => $startDate,
            'end_date' => $endDate,
            'generated_at' => now(),
            'file_path' => $filePath,
        ]);

        // Return download link
        return response()->json([
            'message' => 'Sales report generated successfully!',
            'file_path' => asset('storage/' . $filePath)
        ]);
    }

    // Method to generate and save Inventory Report (example)
    public function generateInventoryReport()
    {
        // Logic for inventory report (you would pull data from inventory)
        $inventoryData = [
            ['medication' => 'Med A', 'stock' => 50, 'sold' => 10],
            ['medication' => 'Med B', 'stock' => 30, 'sold' => 5],
            // more inventory data...
        ];

        // Generate PDF from Blade view (for inventory)
        $pdf = Pdf::loadView('reports.inventory_pdf', compact('inventoryData'));

        // Define file path and save the PDF
        $fileName = 'inventory_report_' . now()->format('YmdHis') . '.pdf';
        $filePath = 'reports/' . $fileName;
        Storage::disk('public')->put($filePath, $pdf->output());

        // Store report in the database
        $report = Report::create([
            'report_type' => 'inventory',
            'generated_at' => now(),
            'file_path' => $filePath,
        ]);

        // Return download link
        return response()->json([
            'message' => 'Inventory report generated successfully!',
            'file_path' => asset('storage/' . $filePath)
        ]);
    }
}
