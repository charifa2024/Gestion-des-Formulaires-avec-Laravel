@extends('layouts.layout')

@section('title', 'Créer une Facture')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Créer une Facture</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('invoices.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="client_name" class="form-label">Nom du Client</label>
                <input type="text" class="form-control" id="client_name" name="client_name" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Montant</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
            </div>
            <div class="mb-3">
                <label for="invoice_date" class="form-label">Date de Facture</label>
                <input type="date" class="form-control" id="invoice_date" name="invoice_date" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="unpaid">Non payée</option>
                    <option value="paid">Payée</option>
                    <option value="canceled">Annulée</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
