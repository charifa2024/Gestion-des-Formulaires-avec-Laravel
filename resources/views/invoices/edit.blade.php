@extends('layouts.layout')

@section('title', 'Modifier une Facture')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Modifier une Facture</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="client_name" class="form-label">Nom du Client</label>
                <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $invoice->client_name }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" value="{{ $invoice->status }}" required>
                    <option value="unpaid">Non payée</option>
                    <option value="paid">Payée</option>
                    <option value="canceled">Annulée</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Montant</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ $invoice->amount }}" required>
            </div>
            <div class="mb-3">
                <label for="invoice_date" class="form-label">Date de Facture</label>
                <input type="date" class="form-control" id="invoice_date" name="invoice_date" value="{{ $invoice->invoice_date }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
