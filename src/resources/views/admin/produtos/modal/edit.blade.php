<!-- Modal  Novo Produto-->
<div class="modal fade" id="modalEditarProduto{{ $produto->id_produto }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar de Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('admin.produtos.update', $produto->id_produto) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nome_produto" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome_produto" name="nome_produto" aria-describedby="alerta-nome_produto" Required value="{{ $produto->nome_produto }}">
                            <div id="alerta-nome_produto" class="form-text">
                                Informe o nome do produto
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descricao_produto" class="form-label">Descrição</label>
                            <textarea class="form-control textarea-xzycode" id="descricao_produto" rows="3" aria-describedby="alerta-descricao" name="descricao_produto" Required>{{$produto->descricao_produto}}</textarea>
                            <div id="alerta-descricao" class="form-text">
                                Descrição do produto
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="status_produto" class="form-label">Status</label>
                                    <select class="form-select" aria-label="Selecione um status" aria-describedby="alerta-ordem_produto" name="status_produto" Required>
                                        <option selected>{{ $produto->status_produto }}</option>
                                        <option value="ATIVO">ATIVO</option>
                                        <option value="INATIVO">INATIVO</option>
                                    </select>
                                    <div id="alerta-ordem_produto" class="form-text">
                                        Informe o status do produto
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer mb-3 btn-modal">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar Produto</button>
                        </div>
                    </div>

                </form>



            </div>

        </div>
    </div>
</div>