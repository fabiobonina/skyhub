            <div class="row">
              <!--Tabela Lista-->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>OAT<small>Lista</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a></li>
                          <li><a href="#">Settings 2</a></li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30"> Dados da tabela.</p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Usuario</th>
                          <th>Cliente</th>
                          <th>Localidade</th>
                          <th>Filial</th>
                          <th>OS</th>
                          <th>Servico</th>
                          <th>Sistema</th>
                          <th>Data Solitação</th>
                          <th>Data Fechamento</th>
                          <th>Data Conclusão</th>
                          <th>Status</th>
                          <th>Ativo</th>
                          <th>Ação</th>
                        </tr>
                      </thead>

                			<?php foreach($oats->findAll() as $key => $value):{ 
                          $oatId = $value->id;
                          $oatUsuario = $value->nickuser;
                          $oatCliente = $value->cliente;
                          $oatLocalId = $value->localidade;
                          $oatFilial = $value->filial;
                          $oatOs = $value->os;
                          $oatServId = $value->servico;
                          $oatSistId = $value->sistema;
                          $oatDataSol = $value->data_sol;
                          $oatDataFec = $value->data_fech;
                          $oatDataTer = $value->data_term;
                          $oatStatus = $value->status;
                          $oatAtivo = $value->ativo;
                          foreach($localidades->findAll() as $key => $value):if($value->id == $oatLocalId) {
                            $oatLocal = $value->nome;
                          }endforeach;             
                          foreach($servicos->findAll() as $key => $value):if($value->id == $oatServId) {
                            $oatServico = $value->descricao;
                          }endforeach;
                          foreach($sistemas->findAll() as $key => $value):if($value->id == $oatSistId) {
                            $oatSistema =  $value->descricao;
                          }endforeach;
                          
                          
                      
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $oatId; ?></td>
                          <td><?php echo $oatUsuario; ?></td>
                          <td><?php echo $oatCliente; ?></td>
                          <td><?php echo $oatLocal; ?></td>
                          <td><?php echo $oatFilial; ?></td>
                          <td><?php echo $oatOs; ?></td>
                          <td><?php echo $oatServico; ?></td>
                          <td><?php echo $oatSistema; ?></td>
                          <td><?php echo $oatDataSol; ?></td>
                          <td><?php echo $oatDataFec; ?></td>
                          <td><?php echo $oatDataTer; ?></td>
                          <td><?php echo $oatStatus; ?></td>
                          <td><?php echo $oatAtivo; ?></td>
                          <td>
                            <?php echo "<a href='oat-operacao.php?acao=oat-finalizar&acao1=consulta&id=" . $oatId . "'><i class='fa  fa-edit'></i>Consulta</a>"; ?>
                            <?php echo "<a href='oat-operacao.php?acao=criar&acao1=edt&oatId=" . $oatId . "'><i class='fa  fa-edit'></i>Editar </a>"; ?>
                            <?php echo "<a href='oat-operacao.php?acao=criar&acao1=deletar&oatId=" . $oatId . "' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?>
                          </td>
                        </tr>
                      </tbody>
                      <?php }endforeach; ?>

                    </table>
                  </div>
                </div>
              </div>
              <!--/Tabela Lista-->
            </div>


