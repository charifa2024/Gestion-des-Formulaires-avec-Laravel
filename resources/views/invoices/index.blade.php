@extends('layouts.layout')

@section('title', 'Liste des Factures')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Liste des Factures</h1>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary">Créer une Facture</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom du Client</th>
            <th>Status</th>
            <th>Montant</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoices as $invoice)
        <tr>
            <td>{{ $invoice->id }}</td>
            <td>{{ $invoice->client_name }}</td>
            <td>{{ $invoice->status }}</td>
            <td>{{ $invoice->amount }}</td>
            <td>{{ $invoice->invoice_date }}</td>
            <td>
                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
