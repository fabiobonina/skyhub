                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Filial</th>
                          <th>OS</th>
                          <th>Usuario</th>
                          <th>Cliente</th>
                          <th>Localidade</th>
                          <th>Servico</th>
                          <th>Sistema</th>
                          <th>Data Solitação</th>
                          <th>Ação</th>
                        </tr>
                      </thead>

                			<?php foreach($oat->findAll() as $key => $value):if($value->ativo == 0 && $value->status == 0 && $value->nickuser == $userUsuario) {
                        $oatId = $value->id;
                        $oatUsuario = $value->nickuser;
                        $oatCliente = $value->cliente;
                        $oatLocalId = $value->localidade;
                        $oatFilial = $value->filial;
                        $oatOs = $value->os;
                        $oatServId = $value->servico;
                        $oatSistId = $value->sistema;
                        $oatDataSol = $value->data_sol;
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
                          <td><?php echo $oatFilial; ?></td>
                          <td><?php echo $oatOs; ?></td>
                          <td><?php echo $oatUsuario; ?></td>
                          <td><?php echo $oatCliente; ?></td>
                          <td><?php echo $oatLocal; ?></td>
                          <td><?php echo $oatServico; ?></td>
                          <td><?php echo $oatSistema; ?></td>
                          <td><?php echo $oatDataSol; ?></td>
                          <td>
                            <?php echo "<a href='oat-operacao.php?acao=criar&acao1=edt&oatId=" . $oatId . "'><i class='fa  fa-edit'></i>Editar </a>"; ?>
                            <?php echo "<a href='oat-operacao.php?acao=criar&acao1=deletar&oatId=" . $oatId . "' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?>
                          </td>
                        </tr>
                      </tbody>
                      <?php }endforeach; ?>

                    </table>