<div class="panel panel-inverse" data-sortable-id="form-stuff-1">
    <div class="panel-heading">
        <h4 class="panel-title text-capitalize">Adicionar <?= $this->uri->segment(1) ?></h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <form action="<?= site_url("produto/store") ?>" class="frm_add_produto" method="POST">
                <div class="col-md-12">
                    <fieldset>
                        <div class="note note-success">
                            <p><b>Dados Gerais</b></p>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input type="text" class="form-control nome_prod" name="nome_prod"
                                           placeholder="Nome"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrição</label>
                                    <input type="text" class="form-control" name="descricao_prod"
                                           placeholder="Descrição"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Categoria</label>
                                            <select class="form-control default-select2 catg_prod"
                                                    name="id_categoria_prod"
                                                    data-placeholder="Selecione a categoria">
                                                <option value=""></option>
                                                <?php foreach ($categorias as $item): ?>
                                                    <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Código</label>
                                            <input type="text" class="form-control codigo_prod" readonly
                                                   name="codigo_prod"
                                                   placeholder="Código"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Data de Fabrico</label>
                                            <input type="text" id="datepicker-autoClose"
                                                   class="form-control" name="data_fab_prod"
                                                   placeholder="Data de Fabrico"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Data de Expiração</label>
                                            <input id="datepicker-inline" type="text" class="form-control"
                                                   name="data_exp_prod"
                                                   placeholder="Data de Expiração"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <div class="col-md-12">
                    <fieldset>
                        <div class="note note-info">
                            <p><b>Estoque e upload de imagem</b></p>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Considerar a Grosso</label>
                                    <input type="text" class="form-control qtde_grosso"
                                           name="qtde_grosso_estq"
                                           placeholder="Quantidade a Grosso"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Qtde inicial a Retalho</label>
                                    <input type="text" class="form-control qtde_retalho"
                                           name="qtde_ini_retalho_estq"
                                           placeholder="Qtde inicial Retalho"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Qtde inicial a Grosso</label>
                                    <input type="text" class="form-control qtde_grosso"
                                           name="qtde_ini_grosso_estq"
                                           placeholder="Qtde inicial Grosso"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantidade Crítica</label>
                                    <input type="text" class="form-control qtde_critica"
                                           name="qtde_critica_estq"
                                           placeholder="Quantidade Crítica"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estante</label>
                                    <input type="text" class="form-control codigo_estante" readonly
                                           name="codigo_estante"
                                           placeholder="Código da Estante"/>
                                    <input type="hidden" class="id_estante" name="id_estante_prod">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Imagem ( opcional )</label>
                                    <input type="file" class="form-control" name="imagem_prod"
                                           placeholder="Qtde inicial Grosso"/>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>

        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-sm btn-primary pull-right">Salvar</button>
            <p>&nbsp;</p>
        </div>
        </form>
    </div>
</div>