<div class="content-page">
  <div class="content">
    <div class="container-fluid">
      <div class="col col-sm-12 col-md-12 col-lg-12 mb-4 mt-4">
      </div>

      <div class="row">
        <?php foreach ($GraficosI->getDataAs("Chart") as $ChartI): ?>
          <div class="col col-sm-12 col-md-12 col-lg-6 mb-3 colunaGrafico">
            <div class="winston">
              <div class="card animate fadeLeft">
                <?php $cor = $ChartI->get('cor');
                $idG = $ChartI->get("id"); ?>
                <div class="card-content graficos" <?= "style='border-left:4px solid $cor'" ?>>
                  <h5 class="mb-0 mt-0 display-flex justify-content-between">
                    <?= mb_convert_case($ChartI->get("nome"), MB_CASE_TITLE, 'UTF-8') ?>
                    <div class="dropdown">
                      <a class="graficoMore" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                          <path
                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        </svg>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" onclick="excluirChart(<?= $idG ?>)">Excluir</a></li>
                      </ul>
                    </div>
                  </h5>

                  <?php if ($ChartI->get("date_inicio") != "0000-00-00"): ?>
                    <p class="medium-small">
                      <?= "De: " . date('d/m/Y', strtotime($ChartI->get("date_inicio"))) . " - Até: " . date('d/m/Y', strtotime($ChartI->get("date_fim"))) ?>
                    </p>
                  <?php else: ?>
                    <p class="medium-small">Todos os registros</p>
                  <?php endif; ?>
                  <div class="current-balance-container exibicaoChart graficonumero<?= $idG ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="row">
        <?php foreach ($Graficos->getDataAs("Chart") as $Chart): ?>
          <div class="col col-sm-12 col-md-12 col-lg-4 mb-3 colunaGrafico">
            <div class="winston">
              <?php $IDG = $Chart->get("id"); ?>
              <?php $eixoX = $Chart->get("eixox"); ?>
              <?php $eixoY = $Chart->get("eixoy"); ?>
              <!-- Current Balance -->
              <div class="card animate fadeLeft">
                <div class="card-content graficos">
                  <h5 class="mb-0 mt-0 display-flex justify-content-between">
                    <?= mb_convert_case($Chart->get("nome"), MB_CASE_TITLE, 'UTF-8') ?>
                    <div class="dropdown">
                      <a class="graficoMore" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                          <path
                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        </svg>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" onclick="excluirChart(<?= $IDG ?>)">Remover</a></li>
                      </ul>
                    </div>
                  </h5>
                  <?php if ($Chart->get("date_inicio") != "0000-00-00"): ?>
                    <p class="medium-small">
                      <?= "De: " . date('d/m/Y', strtotime($Chart->get("date_inicio"))) . " - Até: " . date('d/m/Y', strtotime($Chart->get("date_fim"))) ?>
                    </p>
                  <?php else: ?>
                    <p class="medium-small">Todos os registros</p>
                  <?php endif; ?>
                  <div class="current-balance-container">
                    <canvas id="ct-chart<?= $IDG ?>"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-body">
              <blockquote style="border-bottom:solid 1px #cecece;">
                Grafíco de Relatório
              </blockquote>
              <div clasS="row">
                <div class="col col-sm-12 col-md-12 col-lg-6 mb-4">
                  <aside class="skeleton-aside">
                    <input class="form-control" required id="nomeChart" name="nomeChart" class="mt-5" value=""
                      type="text" placeholder="Digite o nome do Indicador" value="" required>
                    <div class="graficonumero"></div>
                    <div class="ct-chart current-balance-container mt-5">
                      <canvas id="ct-chart"></canvas>
                    </div>
                  </aside>
                </div>
                <div class="col col-sm-12 col-md-12 col-lg-6" style="margin-top: -16px;">
                  <aside class="skeleton-aside-right"
                    style="border-left:solid 1px #cecece; padding: 33px; padding-top:5px;">
                    <div class="row">
                      <div class="col  col-sm-12 col-md-12 col-lg-12 " style="text-align-last: center;">
                        <h5>Detalhes do Gráfico</h5>
                      </div>
                      <div style="text-align: center;" class="col  col-sm-2 col-md-2 col-lg-2 ">
                        <input onchange="ajaxChart()" type="color" onchange="" id="cores" class="input-field"
                          name="ArcoIris" list="arcoIris" type="checkbox"
                          style="padding: none !important;border: none;width: 55px;background: transparent;">

                        <datalist id="arcoIris">
                          <option value="#FF0000">Vermelho</option>
                          <option value="#FFA500">Laranja</option>
                          <option value="#FFFF00">Amarelo</option>
                          <option value="#008000">Verde</option>
                          <option value="#0000FF">Azul</option>
                          <option value="#4B0082">Indigo</option>
                          <option value="#EE82EE">Violeta</option>
                        </datalist>
                      </div>
                    </div>
                    <center>
                      <div class="row">
                        <div align="center" style="text-align: center;" class="col col-sm-12 col-md-12 col-lg-12 mb-1">
                          <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
                            <label style="font-size:12px;">Escolha o tipo de Gráfico</label>
                          </div>
                          <section class="section">
                            <div class="section-content">
                              <div class="row row-dashboard">
                                <div class=" col  col-sm-6 col-md-6 col-lg-3 mb-1">
                                  <div onclick="ajaxChart(1)" class="tamanhoGrafico">
                                    <div id="chart-coluna" value="1" class=" coluna chart-icon">
                                      <span style="font-size:40px">
                                        <img width="40px" src="<?= APPURL . '/assets/images/icon/icon-barras.png' ?>">
                                      </span>
                                      <label style="font-size:12px;display: block;">Coluna</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="active2 col  col-sm-6 col-md-6 col-lg-3 mb-1">
                                  <div onclick="ajaxChart(2)" class="tamanhoGrafico">
                                    <div id="chart-rosca" value="2" class="  rosca chart-icon">
                                      <span style="font-size:40px">
                                        <img width="40px" src="<?= APPURL . '/assets/images/icon/icon-pizza.png' ?>">
                                      </span>
                                      <label style="font-size:12px;display: block;">Rosca</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="active3 col  col-sm-6 col-md-6 col-lg-3 mb-1">
                                  <div onclick="ajaxChart(3)" class="tamanhoGrafico">
                                    <div id="chart-lolipop" value="3" class="  lolipop chart-icon">
                                      <span style="font-size:40px">
                                        <img width="40px" src="<?= APPURL . '/assets/images/icon/icon-line.png' ?>">
                                      </span>
                                      <label style="font-size:12px;display: block;">Linha</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="active5 col  col-sm-6 col-md-6 col-lg-3 mb-1">
                                  <div onclick="ajaxChart(5)" class="tamanhoGrafico">
                                    <div id="chart-numero" value="5" class="  numero chart-icon">
                                      <span style="font-size:40px">
                                        <img width="40px" src="<?= APPURL . '/assets/images/icon/icon-montante.png' ?>">
                                      </span>
                                      <label style="font-size:12px;display: block;">Montante</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="active4 col  col-sm-6 col-md-6 col-lg-3 mb-1">
                                  <div onclick="ajaxChart(4)" class="chartDuplo  tamanhoGrafico">
                                    <div id="chart-comparacao" value="4" class=" comparacao chart-icon">
                                      <span style="font-size:40px">
                                        <img width="40px"
                                          src="<?= APPURL . '/assets/images/icon/icon-comparacoes.png' ?>">
                                      </span>
                                      <label style="font-size:12px;display: block;">Comparação</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="active7 col  col-sm-6 col-md-6 col-lg-3 mb-1">
                                  <div onclick="ajaxChart(7)" class="chartDuplo  tamanhoGrafico">
                                    <div id="chart-comparacao_entrega" value="7" class=" entrega chart-icon">
                                      <span style="font-size:40px">
                                        <img width="40px"
                                          src="<?= APPURL . '/assets/images/icon/icon-comparacoes.png' ?>">
                                      </span>
                                      <label style="font-size:12px;display: block;">Tipo Entrega</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="active6 col  col-sm-6 col-md-6 col-lg-3 mb-1">
                                  <div onclick="ajaxChart(6)" class="chartDuplo  tamanhoGrafico">
                                    <div id="chart-porcentagem" value="6" class=" porcentagem chart-icon">
                                      <span style="font-size:40px">
                                        <img width="40px"
                                          src="<?= APPURL . '/assets/images/icon/icon-porcentagem.png' ?>">
                                      </span>
                                      <label style="font-size:12px;display: block;">Valor</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </section>
                        </div>
                      </div>
                    </center>
                    <center>
                      <div class="row ml-20">
                        <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
                          <label class="active" for="medida-principal">Indicador</label>
                          <select onchange="indicador()" required style="width:100%" onchange="ajaxChart()"
                            id="indicador" name="tarefa-principal" class="form-control  select-chart select2"
                            id="tarefa-principal">
                            <option value="" selected disabled="">Selecione</option>
                            <?php foreach ($Indicadores->getDataAs("Indicador") as $i): ?>
                              <option value="<?= $i->get("id") ?>"><?= $i->get("nome") ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div id="divTipo" class="col col-sm-12 col-md-12 col-lg-12 mb-3">
                          <label class="active" for="medida-principal">Tipo de filtro</label>
                          <select required style="width:100%" onchange="ajaxChart()" id="tipoFiltro"
                            name="grupo-principal" class="form-control select-chart select2">
                            <option value="" selected disabled="">Selecione</option>
                            <option value="1">Valor</option>
                            <option value="2">Quantidade</option>
                          </select>
                        </div>
                        <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
                          <label class="active" for="medida-principal">Eixo X</label>
                          <select required style="width:100%" onchange="ajaxChart()" id="eixoX" name="grupo-principal"
                            class="form-control select-chart select2">
                            <option value="" selected disabled="">Selecione</option>
                            <!-- 										 <option  value="3">Últimos 12 Meses </option>   -->
                          </select>
                        </div>
                        <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
                          <label class="active" for="medida-principal">Eixo Y</label>
                          <select required style="width:100%" onchange="ajaxChart()" id="eixoY" name="medida-principal"
                            class="form-control select-chart select2">
                            <option value="" selected disabled="">Selecione</option>
                          </select>
                        </div>
                      </div>
                      <div class="row" style="border-bottom:solid 1px #cecece;margin-top:5px">
                        <div class="filtros-selecionados">
                          <div id="fecharData">
                            <a href="javascript:void(0)" onclick="fecharData()"
                              style="color:red; float:right;font-size:18px;margin-top:-28px">X </a>
                          </div>
                          <div class="row">
                            <div id="datainicio" class="col col-sm-12 col-md-12 col-lg-6 mb-3">
                              <input style="width:100%" onchange="ajaxChart()" class="dataComeco form-control form-date"
                                id="dataComeco" name="dataComeco" value="<?= date('Y-m-d', strtotime('-1 month')) ?>"
                                type="date">Inicio</input>
                            </div>
                            <div id="datafim" class="col col-sm-12 col-md-12 col-lg-6 mb-3">
                              <input style="width:100%" onchange="ajaxChart()" class="dataFinal form-control form-date"
                                id="dataFinal" name="dataFinal" value="<?= date('Y-m-d') ?>" type="date">Fim</input>

                            </div>
                          </div>

                        </div>

                        <div id="usuarioFiltro" style="border-bottom:solid 1px; border-color:#cecece;">
                          <div class="col col-sm-12 col-md-12 col-lg-12 mb-3"> <a onclick="fecharUser()"
                              style="color:red; float:right;font-size:18px;">X </a>
                            <select style="width:100%" onchange="ajaxChart(1)" name="omitir"
                              class="omitir select2 form-control " required id="omitir">
                              <option value="" disabled selected>Usuários Selecionados:</option>
                              <option value="1">Excluir Usuários</option>
                              <option value="0">Selecionar Apenas Usuários</option>
                            </select>
                          </div>
                          <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
                            <select placeholder="Seleciones os Usuarios" style="width:100%" onchange="ajaxChart()"
                              id="usuariosSelecionado" class="form-control select2 usuariosSelecionados"
                              name="usuariosSelecionado" multiple>

                              <?php foreach ($ArrayUsuarios as $u): ?>
                                <option value="<?= $u['id'] ?>"><?= $u['nome'] . " - " . $u['tipo_conta'] ?></option>
                              <?php endforeach; ?>
                            </select>
                            <label class="active" for="medida-principal">Selecione os Usuários</label>
                            <label class="s12 m12 l12 label" for="usuarioSelect" class="active"></label>
                          </div>
                        </div>
                      </div>
                      <div id="div-filtros-ativos" class="col col-sm-12 col-md-12 col-lg-12 mt-2 mb-3">
                        <label id="add-filtros" class="add-filtros" style="position:relative; ">
                          <span onclick="addFiltro()" id="text-filtros">+ Adicionar Filtros</span>
                        </label>
                      </div>
                      <div class="selectFiltro" style="display:none;">
                        <div class="col col-sm-12 col-md-12 col-lg-12 mt-2 mb-3" style="margin-top:8px">
                          <select style="width:100%" name="selecExc" onchange="ajaxChart(1)" id="select-filtros"
                            class="select2 form-control select-chart" data-id="0" style="display:none">
                            <option selected disabled value="0">Selecione o Filtro</option>
                            <option value="1">Data</option>
                            <option hidden="hidden" id="excecoes" value="2">Exceções Usuários</option>
                          </select>
                        </div>
                      </div>
                    </center>
                    <!-- 			btn 1		 -->
                    <div>
                      <div class="row" style="justify-content: center;">
                        <div class="col  col-sm-6 col-md-2 col-lg-2 ">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                        <div class="col col-sm-6 col-md-2 col-lg-2 ">
                          <button id="saveCharts" type="button" class="btn btn-info waves-light">Salvar</button>
                        </div>
                      </div>
                    </div>
                    <!-- 			btn1	 -->
                  </aside>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>