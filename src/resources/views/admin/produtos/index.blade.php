@extends('layout.admin')

@section('title', 'Produtos | Confeitaria Dashboard')

@section('pg-titulo', 'Produtos')

@section('link-topo', 'Produtos')

@section('content')

<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gerenciamento de Produtos</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNovoProduto">
                            <i class="bi bi-plus-circle"></i>
                            Novo Produto
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 100px">Ordem</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Tamanho</th>
                                <th>Unidade de Medida</th>
                                <th>Valor</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th style="width: 200px">Editar / Excluir </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produtos as $linha)
                            <tr class="align-middle">
                                <td>{{ $linha->ordem_produto }}</td>
                                <td>{{ $linha->nome_produto }}</td>
                                <td>{{ $linha->descricao_produto }}</td>
                                <td>{{ $linha->tamanho_produto }}</td>
                                <td>{{ $linha->unid_med_produto }}</td>
                                <td>{{ $linha->valor_produto }}</td>
                                <td>
                                    <img src="{{ asset($linha->foto_produto) }}" alt="{{ $linha->slug_produto }}" class="img-thumbnail" style="max-width: 100px;">
                                </td>
                                <td>
                                    @if($linha->status_produto === 'ATIVO')
                                        <span class="badge text-bg-success">ATIVO</span>
                                    @else
                                        <span class="badge text-bg-danger">INATIVO</span>
                                    @endif
                                </td>
                                <td>

                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria{{ $linha->id_categoria }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger">
                                        <i class="bi bi-trash3"></i>
                                    </button>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>Nenhum produto cadastrado</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                    
                </div> <!-- /.card-body -->
                
            </div> <!-- /.card -->
            


        </div> <!--end::Row-->

    </div> <!--end::Container-->

</div> <!--end::App Content-->


@include('admin.produtos.modal.create')

@endsection