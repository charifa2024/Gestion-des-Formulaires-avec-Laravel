<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
class InvoiceController extends Controller
{
    //
    public function index(){
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    public function create(){
        return view('invoices.create');
    }

    public function store(Request $request){
        $request->validate([
            'client_name' => 'required|max:255',
            'invoice_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'in:unpaid,paid,canceled',
        ]);
        $invoice = new Invoice();
        $invoice->client_name = $request->input('client_name');
        $invoice->invoice_date = $request->input('invoice_date');
        $invoice->amount = $request->input('amount');
        $invoice->status = $request->input('status');
        $invoice->save();
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
    }

    public function edit($id){
        $invoice = Invoice::findOrFail($id);
        return view('invoices.edit', compact('invoice'));
    }


    public function update(Request $request, $id){
        $request->validate([
            'client_name' => 'required|max:255',
            'invoice_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'in:unpaid,paid,canceled',
        ]);
        $invoice = Invoice::findOrFail($id);
        $invoice->client_name = $request->input('client_name');
        $invoice->invoice_date = $request->input('invoice_date');
        $invoice->amount = $request->input('amount');
        $invoice->status = $request->input('status');
        $invoice->save();
        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully!');
    }
    //supprimer une facture
    public function destroy($id){
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully!');
    }
  
}
