<?php

// require_once 'GrafoDirecionalNaoPonderado.php';
// require_once 'GrafoNaoDirecionalPonderado.php';

// function escolherTipoGrafo() {
//     echo "Escolha o tipo de grafo:\n";
//     echo "1. Grafo direcional não ponderado\n";
//     echo "2. Grafo não direcional ponderado\n";
//     $tipo = trim(fgets(STDIN));
//     switch ($tipo) {
//         case 1:
//             $grafo = montarGrafoDirecionalNaoPonderado();
//             break;
//         case 2:
//             $grafo = montarGrafoNaoDirecionalPonderado();
//             break;
//         default:
//             echo "Opção inválida.\n";
//             exit;
//     }
//     return $grafo;
// }

// function montarGrafoDirecionalNaoPonderado() {
//     echo "Montando Grafo Direcional Não Ponderado:\n";
//     echo "Informe o número de nós: ";
//     $numeroNos = trim(fgets(STDIN));
    
//     $nos = [];
//     for ($i = 1; $i <= $numeroNos; $i++) {
//         echo "Informe o nome do nó $i: ";
//         $nomeNo = trim(fgets(STDIN));
//         $nos[] = $nomeNo;
//     }
    
//     $grafo = new GrafoDirecionalNaoPonderado($nos);
    
//     while (true) {
//         echo "Digite 1 para adicionar arestas, 2 para imprimir o grafo, 3 para ordenação topológica, 4 para componentes fortemente conectados ou 0 para sair: ";
//         $opcao = trim(fgets(STDIN));
//         switch ($opcao) {
//             case 1:
//                 adicionarArestas($grafo);
//                 break;
//             case 2:
//                 $grafo->imprimirGrafo();
//                 break;
//             case 3:
//                 $grafo->ordenacaoTopologica();
//                 break;
//             case 4:
//                 $grafo->encontrarComponentesFortementeConectados();
//                 break;
//             case 0:
//                 exit;
//             default:
//                 echo "Opção inválida.\n";
//                 break;
//         }
//     }
// }

// function montarGrafoNaoDirecionalPonderado() {
//     echo "Montando Grafo Não Direcional Ponderado:\n";
//     echo "Informe o número de nós: ";
//     $numeroNos = trim(fgets(STDIN));

//     $nos = [];
//     $coordenadas = [];
//     for ($i = 1; $i <= $numeroNos; $i++) {
//         echo "Informe o nome do nó $i: ";
//         $nomeNo = trim(fgets(STDIN));
//         $nos[] = $nomeNo;

//         echo "Informe as coordenadas X e Y do nó $nomeNo (separadas por espaço): ";
//         $coordenadas[$nomeNo] = array_map('floatval', explode(' ', trim(fgets(STDIN))));
//     }

//     // Cria o grafo com base nos nós e coordenadas
//     $grafo = new GrafoNaoDirecionalPonderado($nos, $coordenadas);

//     while (true) {
//         echo "Digite 1 para adicionar arestas, 2 para imprimir o grafo, 3 para executar Dijkstra, 4 para executar A*, ou 0 para sair: ";
//         $opcao = trim(fgets(STDIN));

//         if ($opcao == 1) {
//             echo "Digite o nó de origem: ";
//             $origem = trim(fgets(STDIN));
//             echo "Digite o nó de destino: ";
//             $destino = trim(fgets(STDIN));
//             echo "Digite o peso da aresta: ";
//             $peso = intval(trim(fgets(STDIN)));
//             $grafo->adicionarAresta($origem, $destino, $peso);
//         } elseif ($opcao == 2) {
//             $grafo->imprimirGrafo();
//         } elseif ($opcao == 3) {
//             echo "Digite o nó de início: ";
//             $inicio = trim(fgets(STDIN));
//             echo "Digite o nó de fim: ";
//             $fim = trim(fgets(STDIN));
//             $grafo->dijkstra($inicio, $fim);
//         } elseif ($opcao == 4) {
//             echo "Digite o nó de início: ";
//             $inicio = trim(fgets(STDIN));
//             echo "Digite o nó de fim: ";
//             $fim = trim(fgets(STDIN));
//             $grafo->aEstrela($inicio, $fim);
//         } elseif ($opcao == 0) {
//             break;
//         }
//     }
// }

// function adicionarArestas($grafo) {
//     while (true) {
//         echo "Digite o nó de origem (ou 0 para parar): ";
//         $origem = trim(fgets(STDIN));
//         if ($origem === '0') {
//             break;
//         }
//         echo "Digite o nó de destino: ";
//         $destino = trim(fgets(STDIN));
//         $grafo->adicionarAresta($origem, $destino);
//     }
// }

// function adicionarArestasPonderadas($grafo) {
//     while (true) {
//         echo "Digite o nó de origem (ou 0 para parar): ";
//         $origem = trim(fgets(STDIN));
//         if ($origem === '0') {
//             break;
//         }
//         echo "Digite o nó de destino: ";
//         $destino = trim(fgets(STDIN));
//         echo "Digite o peso da aresta: ";
//         $peso = trim(fgets(STDIN));
//         $grafo->adicionarAresta($origem, $destino, (int)$peso);
//     }
// }

// function executarDijkstra($grafo) {
//     echo "Digite o nó de início: ";
//     $inicio = trim(fgets(STDIN));
//     echo "Digite o nó de fim: ";
//     $fim = trim(fgets(STDIN));
//     $grafo->dijkstra($inicio, $fim);
// }

// $grafo = escolherTipoGrafo();

// require_once 'GrafoDirecionalNaoPonderado.php';
// require_once 'GrafoNaoDirecionalPonderado.php';

// function escolherTipoGrafo() {
//     echo "Escolha o tipo de grafo:\n";
//     echo "1. Grafo direcional não ponderado\n";
//     echo "2. Grafo não direcional ponderado\n";
//     $tipo = trim(fgets(STDIN));
//     switch ($tipo) {
//         case 1:
//             $grafo = montarGrafoDirecionalNaoPonderado();
//             break;
//         case 2:
//             $grafo = montarGrafoNaoDirecionalPonderado();
//             break;
//         default:
//             echo "Opção inválida.\n";
//             exit;
//     }
//     return $grafo;
// }

// function montarGrafoDirecionalNaoPonderado() {
//     echo "Montando Grafo Direcional Não Ponderado:\n";
//     echo "Informe o número de nós: ";
//     $numeroNos = trim(fgets(STDIN));
    
//     $nos = [];
//     for ($i = 1; $i <= $numeroNos; $i++) {
//         echo "Informe o nome do nó $i: ";
//         $nomeNo = trim(fgets(STDIN));
//         $nos[] = $nomeNo;
//     }
    
//     $grafo = new GrafoDirecionalNaoPonderado($nos);
    
//     while (true) {
//         echo "Digite 1 para adicionar arestas, 2 para imprimir o grafo, 3 para ordenação topológica, 4 para componentes fortemente conectados ou 0 para sair: ";
//         $opcao = trim(fgets(STDIN));
//         switch ($opcao) {
//             case 1:
//                 adicionarArestas($grafo);
//                 break;
//             case 2:
//                 $grafo->imprimirGrafo();
//                 break;
//             case 3:
//                 $grafo->ordenacaoTopologica();
//                 $grafo->imprimirDescobertaFinalizacao(); // Adicionado para mostrar ordem de descoberta e finalização
//                 break;
//             case 4:
//                 $grafo->encontrarComponentesFortementeConectados();
//                 break;
//             case 0:
//                 exit;
//             default:
//                 echo "Opção inválida.\n";
//                 break;
//         }
//     }
// }

require_once 'GrafoDirecionalNaoPonderado.php';
require_once 'GrafoNaoDirecionalPonderado.php';

// function escolherTipoGrafo() {
//     echo "1. Grafo direcional não ponderado\n";
//     echo "2. Grafo não direcional ponderado\n";
//     echo "Escolha o tipo de grafo: \n";
//     $tipo = trim(fgets(STDIN));
//     switch ($tipo) {
//         case 1:
//             $grafo = montarGrafoDirecionalNaoPonderado();
//             break;
//         case 2:
//             $grafo = montarGrafoNaoDirecionalPonderado();
//             break;
//         default:
//             echo "Opção inválida.\n";
//             exit;
//     }
//     return $grafo;
// }

// function montarGrafoDirecionalNaoPonderado() {
//     echo "Montando Grafo Direcional Não Ponderado:\n";
//     echo "Informe o número de nós: ";
//     $numeroNos = trim(fgets(STDIN));
    
//     $nos = [];
//     for ($i = 1; $i <= $numeroNos; $i++) {
//         echo "Informe o nome do nó $i: ";
//         $nomeNo = trim(fgets(STDIN));
//         $nos[] = $nomeNo;
//     }
    
//     $grafo = new GrafoDirecionalNaoPonderado($nos);
    
//     while (true) {
//         echo "Digite 1 para adicionar arestas, 2 para imprimir o grafo, 3 para ordenação topológica, 4 para componentes fortemente conectados ou 0 para sair: ";
//         $opcao = trim(fgets(STDIN));
//         switch ($opcao) {
//             case 1:
//                 while (true) {
//                     echo "Digite o nó de origem (ou 0 para parar): ";
//                     $origem = trim(fgets(STDIN));
//                     if ($origem == '0') {
//                         break;
//                     }
//                     echo "Digite o nó de destino: ";
//                     $destino = trim(fgets(STDIN));
//                     $grafo->adicionarAresta($origem, $destino);
//                 }
//                 break;
//             case 2:
//                 $grafo->imprimirGrafo();
//                 break;
//             case 3:
//                 $grafo->imprimirOrdenacaoTopologica();
//                 break;
//             case 4:
//                 echo "Escolha um nó para iniciar a busca em profundidade: ";
//                 $inicio = trim(fgets(STDIN));
//                 if (!in_array($inicio, $grafo->getNos())) {
//                     echo "Nó inválido.\n";
//                     break;
//                 }
//                 $grafo->encontrarComponentesFortementeConectados($inicio);
//                 break;
//             case 0:
//                 exit;
//             default:
//                 echo "Opção inválida.\n";
//                 break;
//         }
//     }
// }

// function montarGrafoNaoDirecionalPonderado() {
//     echo "Montando Grafo Não Direcional Ponderado:\n";
//     echo "Informe o número de nós: ";
//     $numeroNos = trim(fgets(STDIN));

//     $nos = [];
//     $coordenadas = [];
//     for ($i = 1; $i <= $numeroNos; $i++) {
//         echo "Informe o nome do nó $i: ";
//         $nomeNo = trim(fgets(STDIN));
//         $nos[] = $nomeNo;

//         echo "Informe as coordenadas X e Y do nó $nomeNo (separadas por espaço): ";
//         $coordenadas[$nomeNo] = array_map('floatval', explode(' ', trim(fgets(STDIN))));
//     }

//     $grafo = new GrafoNaoDirecionalPonderado($nos, $coordenadas);

//     while (true) {
//         echo "Digite 1 para adicionar arestas, 2 para imprimir o grafo, 3 para executar Dijkstra, 4 para executar A*, ou 0 para sair: ";
//         $opcao = trim(fgets(STDIN));

//         if ($opcao == 1) {
//             echo "Digite o nó de origem: ";
//             $origem = trim(fgets(STDIN));
//             echo "Digite o nó de destino: ";
//             $destino = trim(fgets(STDIN));
//             echo "Digite o peso da aresta: ";
//             $peso = intval(trim(fgets(STDIN)));
//             $grafo->adicionarAresta($origem, $destino, $peso);
//         } elseif ($opcao == 2) {
//             $grafo->imprimirGrafo();
//         } elseif ($opcao == 3) {
//             echo "Digite o nó de início: ";
//             $inicio = trim(fgets(STDIN));
//             echo "Digite o nó de fim: ";
//             $fim = trim(fgets(STDIN));
//             $grafo->dijkstra($inicio, $fim);
//         } elseif ($opcao == 4) {
//             echo "Digite o nó de início: ";
//             $inicio = trim(fgets(STDIN));
//             echo "Digite o nó de fim: ";
//             $fim = trim(fgets(STDIN));
//             $grafo->aEstrela($inicio, $fim);
//         } elseif ($opcao == 0) {
//             break;
//         }
//     }
// }

// function adicionarArestas($grafo) {
//     while (true) {
//         echo "Digite o nó de origem (ou 0 para parar): ";
//         $origem = trim(fgets(STDIN));
//         if ($origem === '0') {
//             break;
//         }
//         echo "Digite o nó de destino: ";
//         $destino = trim(fgets(STDIN));
//         $grafo->adicionarAresta($origem, $destino);
//     }
// }

// function adicionarArestasPonderadas($grafo) {
//     while (true) {
//         echo "Digite o nó de origem (ou 0 para parar): ";
//         $origem = trim(fgets(STDIN));
//         if ($origem === '0') {
//             break;
//         }
//         echo "Digite o nó de destino: ";
//         $destino = trim(fgets(STDIN));
//         echo "Digite o peso da aresta: ";
//         $peso = trim(fgets(STDIN));
//         $grafo->adicionarAresta($origem, $destino, (int)$peso);
//     }
// }

// $grafo = escolherTipoGrafo();

require_once 'GrafoDirecionalNaoPonderado.php';
require_once 'GrafoNaoDirecionalPonderado.php';
include 'clear.php'; 

// function menuPrincipal() {
//     // clear();
//     echo "\nMenu Principal\n";
//     echo "1. Criar novo grafo\n";
//     echo "2. Sair\n";
//     echo "Escolha uma opção: ";
//     return trim(fgets(STDIN));
// }

// function menuGrafo($tipoGrafo) {
//     // clear();
//     echo "\nMenu do Grafo\n";
//     echo "1. Adicionar arestas\n";
//     echo "2. Imprimir grafo\n";
//     if ($tipoGrafo == 2) {
//         echo "3. Executar Dijkstra\n";
//         echo "4. Executar A*\n";
//     }
//     if ($tipoGrafo == 1) {
//         echo "3. Ordenação topológica\n";
//         echo "4. Encontrar componentes fortemente conectados\n";
//     }
//     echo "0. Voltar ao menu principal\n";
//     echo "Escolha uma opção: ";
//     return trim(fgets(STDIN));
// }

// function criarGrafo() {
//     // clear();
//     echo "\nCriar Novo Grafo\n";
//     echo "1. Grafo direcional não ponderado\n";
//     echo "2. Grafo não direcional ponderado\n";
//     echo "Escolha o tipo de grafo: ";
//     $tipo = trim(fgets(STDIN));

//     switch ($tipo) {
//         case '1':
//             return montarGrafoDirecionalNaoPonderado();
//         case '2':
//             return montarGrafoNaoDirecionalPonderado();
//         default:
//             echo "Opção inválida. Tente novamente.\n";
//             return null;
//     }
// }

// function montarGrafoDirecionalNaoPonderado() {
//     // clear();
//     echo "\nMontando Grafo Direcional Não Ponderado:\n";
//     echo "Informe o número de nós: ";
//     $numeroNos = trim(fgets(STDIN));
    
//     $nos = [];
//     for ($i = 1; $i <= $numeroNos; $i++) {
//         echo "Informe o nome do nó $i: ";
//         $nomeNo = trim(fgets(STDIN));
//         $nos[] = $nomeNo;
//     }
    
//     $grafo = new GrafoDirecionalNaoPonderado($nos);
    
//     while (true) {
//         $opcao = menuGrafo(1);
//         switch ($opcao) {
//             case '1':
//                 adicionarArestas($grafo);
//                 break;
//             case '2':
//                 $grafo->imprimirGrafo();
//                 break;
//             case '3':
//                 $grafo->imprimirOrdenacaoTopologica();
//                 break;
//             case '4':
//                 echo "Escolha um nó para iniciar a busca em profundidade: ";
//                 $inicio = trim(fgets(STDIN));
//                 if (!in_array($inicio, $grafo->getNos())) {
//                     echo "Nó inválido.\n";
//                     break;
//                 }
//                 $grafo->encontrarComponentesFortementeConectados();
//                 break;
//             case '0':
//                 return null;
//             default:
//                 echo "Opção inválida. Tente novamente.\n";
//                 break;
//         }
//     }
// }

// function montarGrafoNaoDirecionalPonderado() {
//     // clear();
//     echo "\nMontando Grafo Não Direcional Ponderado:\n";
//     echo "Informe o número de nós: ";
//     $numeroNos = trim(fgets(STDIN));

//     $nos = [];
//     for ($i = 1; $i <= $numeroNos; $i++) {
//         echo "Informe o nome do nó $i: ";
//         $nomeNo = trim(fgets(STDIN));
//         $nos[] = $nomeNo;
//     }

//     $grafo = new GrafoNaoDirecionalPonderado($nos);

//     while (true) {
//         $opcao = menuGrafo(2);
//         switch ($opcao) {
//             case '1':
//                 adicionarArestasPonderadas($grafo);
//                 break;
//             case '2':
//                 $grafo->imprimirGrafo();
//                 break;
//             case '3':
//                 echo "Digite o nó de início: ";
//                 $inicio = trim(fgets(STDIN));
//                 echo "Digite o nó de fim: ";
//                 $fim = trim(fgets(STDIN));
//                 $grafo->dijkstra($inicio, $fim);
//                 break;
//                 case '4':
//                     // Solicitar coordenadas se o algoritmo A* for escolhido
//                     echo "Informe as coordenadas dos nós (separadas por espaço, ex: x y):\n";
//                     $coordenadas = [];
//                     foreach ($nos as $no) {
//                         echo "Coordenadas para o nó $no: ";
//                         $entrada = trim(fgets(STDIN));
//                         if ($entrada === '') {
//                             // Se a entrada estiver vazia, não adiciona coordenadas para este nó
//                             continue;
//                         }
//                         $coordenadas[$no] = array_map('floatval', explode(' ', $entrada));
//                     }
                    
//                     // Cria o grafo e define as coordenadas, se fornecidas
//                     $grafo = new GrafoNaoDirecionalPonderado($nos, $coordenadas);
                    
//                     echo "Digite o nó de início: ";
//                     $inicio = trim(fgets(STDIN));
//                     echo "Digite o nó de fim: ";
//                     $fim = trim(fgets(STDIN));
                    
//                     // Verifica se as coordenadas foram fornecidas e executa o algoritmo A* ou Dijkstra
//                     if (!empty($coordenadas)) {
//                         $grafo->aEstrela($inicio, $fim);
//                     } else {
//                         $grafo->dijkstra($inicio, $fim);
//                     }
//                     break;
                
//             case '0':
//                 return null;
//             default:
//                 echo "Opção inválida. Tente novamente.\n";
//                 break;
//         }
//     }
// }

// function adicionarArestas($grafo) {
//     echo "\nAdicionar Arestas\n";
//     while (true) {
//         echo "Digite o nó de origem (ou 0 para parar): ";
//         $origem = trim(fgets(STDIN));
//         if ($origem === '0') {
//             break;
//         }
//         echo "Digite o nó de destino: ";
//         $destino = trim(fgets(STDIN));
//         $grafo->adicionarAresta($origem, $destino);
//     }
// }

// function adicionarArestasPonderadas($grafo) {
//     echo "\nAdicionar Arestas Ponderadas\n";
//     while (true) {
//         echo "Digite o nó de origem (ou 0 para parar): ";
//         $origem = trim(fgets(STDIN));
//         if ($origem === '0') {
//             break;
//         }
//         echo "Digite o nó de destino: ";
//         $destino = trim(fgets(STDIN));
//         echo "Digite o peso da aresta: ";
//         $peso = trim(fgets(STDIN));
//         $grafo->adicionarAresta($origem, $destino, (int)$peso);
//     }
// }

// do {
//     $opcaoMenuPrincipal = menuPrincipal();

//     switch ($opcaoMenuPrincipal) {
//         case '1':
//             $grafo = criarGrafo();
//             if ($grafo) {
//                 // A função `criarGrafo` já lida com o menu específico do grafo.
//             }
//             break;
//         case '2':
//             echo "Saindo...\n";
//             break;
//         default:
//             echo "Opção inválida. Tente novamente.\n";
//             break;
//     }
// } while ($opcaoMenuPrincipal !== '2');

// ?>

<?php

// Inclua as definições das classes GrafoDirecionalNaoPonderado e GrafoNaoDirecionalPonderado aqui

function menuPrincipal() {
    echo "\nMenu Principal\n";
    echo "1. Criar novo grafo\n";
    echo "2. Sair\n";
    echo "Escolha uma opção: ";
    return trim(fgets(STDIN));
}

function menuGrafo($tipoGrafo) {
    echo "\nMenu do Grafo\n";
    echo "1. Adicionar arestas\n";
    echo "2. Imprimir grafo\n";
    if ($tipoGrafo == 2) {
        echo "3. Executar Dijkstra\n";
        echo "4. Executar A*\n";
    }
    if ($tipoGrafo == 1) {
        echo "3. Ordenação topológica\n";
        echo "4. Encontrar componentes fortemente conectados\n";
    }
    echo "0. Voltar ao menu principal\n";
    echo "Escolha uma opção: ";
    return trim(fgets(STDIN));
}

function criarGrafo() {
    echo "\nCriar Novo Grafo\n";
    echo "1. Grafo direcional não ponderado\n";
    echo "2. Grafo não direcional ponderado\n";
    echo "Escolha o tipo de grafo: ";
    $tipo = trim(fgets(STDIN));

    switch ($tipo) {
        case '1':
            return montarGrafoDirecionalNaoPonderado();
        case '2':
            return montarGrafoNaoDirecionalPonderado();
        default:
            echo "Opção inválida. Tente novamente.\n";
            return null;
    }
}

function montarGrafoDirecionalNaoPonderado() {
    echo "\nMontando Grafo Direcional Não Ponderado:\n";
    echo "Informe o número de nós: ";
    $numeroNos = trim(fgets(STDIN));
    
    $nos = [];
    for ($i = 1; $i <= $numeroNos; $i++) {
        echo "Informe o nome do nó $i: ";
        $nomeNo = trim(fgets(STDIN));
        $nos[] = $nomeNo;
    }
    
    $grafo = new GrafoDirecionalNaoPonderado($nos);
    
    while (true) {
        $opcao = menuGrafo(1);
        switch ($opcao) {
            case '1':
                adicionarArestas($grafo);
                break;
            case '2':
                $grafo->imprimirGrafo();
                break;
            case '3':
                $grafo->imprimirOrdenacaoTopologica();
                break;
            case '4':
                echo "Escolha um nó para iniciar a busca em profundidade: ";
                $inicio = trim(fgets(STDIN));
                if (!in_array($inicio, $grafo->getNos())) {
                    echo "Nó inválido.\n";
                    break;
                }
                $grafo->encontrarComponentesFortementeConectados();
                break;
            case '0':
                return null;
            default:
                echo "Opção inválida. Tente novamente.\n";
                break;
        }
    }
}

function montarGrafoNaoDirecionalPonderado() {
    echo "\nMontando Grafo Não Direcional Ponderado:\n";
    echo "Informe o número de nós: ";
    $numeroNos = trim(fgets(STDIN));

    $nos = [];
    for ($i = 1; $i <= $numeroNos; $i++) {
        echo "Informe o nome do nó $i: ";
        $nomeNo = trim(fgets(STDIN));
        $nos[] = $nomeNo;
    }

    $grafo = new GrafoNaoDirecionalPonderado($nos);

    while (true) {
        $opcao = menuGrafo(2);
        switch ($opcao) {
            case '1':
                adicionarArestasPonderadas($grafo);
                break;
            case '2':
                $grafo->imprimirGrafo();
                break;
            case '3':
                echo "Digite o nó de início: ";
                $inicio = trim(fgets(STDIN));
                echo "Digite o nó de fim: ";
                $fim = trim(fgets(STDIN));
                $grafo->dijkstra($inicio, $fim);
                break;
            // case '4':
            //     // Solicitar heurísticas pré-calculadas se o algoritmo A* for escolhido
            //     echo "Informe as heurísticas para os nós (separadas por espaço, ex: h1 h2 h3):\n";
            //     $heuristicas = [];
            //     foreach ($nos as $no) {
            //         echo "Heurísticas para o nó $no: ";
            //         $entrada = trim(fgets(STDIN));
            //         if ($entrada === '') {
            //             // Se a entrada estiver vazia, não adiciona heurísticas para este nó
            //             continue;
            //         }
            //         $heuristicas[$no] = array_map('floatval', explode(' ', $entrada));
            //     }
                
            //     // Cria o grafo e define as heurísticas, se fornecidas
            //     $grafo = new GrafoNaoDirecionalPonderado($nos, $heuristicas);
                
            //     echo "Digite o nó de início: ";
            //     $inicio = trim(fgets(STDIN));
            //     echo "Digite o nó de fim: ";
            //     $fim = trim(fgets(STDIN));
                
            //     // Verifica se as heurísticas foram fornecidas e executa o algoritmo A* ou Dijkstra
            //     if (!empty($heuristicas)) {
            //         $grafo->aEstrela($inicio, $fim);
            //     } else {
            //         $grafo->dijkstra($inicio, $fim);
            //     }
            //     break;
                
            case '4':
                // Solicitar heurísticas para cada nó individualmente se o algoritmo A* for escolhido
                $heuristicas = [];
                foreach ($nos as $no) {
                    echo "Heurísticas para o nó $no: ";
                    $entrada = trim(fgets(STDIN));
                    $heuristicas[$no] = floatval($entrada);
                }
            
                // Cria o grafo e define as heurísticas, se fornecidas
                $grafo = new GrafoNaoDirecionalPonderado($nos);
            
                // Define as heurísticas no grafo
                $grafo->setHeuristicas($heuristicas);
            
                echo "Digite o nó de início: ";
                $inicio = trim(fgets(STDIN));
                echo "Digite o nó de fim: ";
                $fim = trim(fgets(STDIN));
                
                // Verifica se as heurísticas foram fornecidas e executa o algoritmo A* ou Dijkstra
                if (!empty($heuristicas)) {
                    $grafo->aEstrela($inicio, $fim);
                } else {
                    $grafo->dijkstra($inicio, $fim);
                }
                break;
            
            case '0':
                return null;
            default:
                echo "Opção inválida. Tente novamente.\n";
                break;
        }
    }
}

function adicionarArestas($grafo) {
    echo "\nAdicionar Arestas\n";
    while (true) {
        echo "Digite o nó de origem (ou 0 para parar): ";
        $origem = trim(fgets(STDIN));
        if ($origem === '0') {
            break;
        }
        echo "Digite o nó de destino: ";
        $destino = trim(fgets(STDIN));
        $grafo->adicionarAresta($origem, $destino);
    }
}

function adicionarArestasPonderadas($grafo) {
    echo "\nAdicionar Arestas Ponderadas\n";
    while (true) {
        echo "Digite o nó de origem (ou 0 para parar): ";
        $origem = trim(fgets(STDIN));
        if ($origem === '0') {
            break;
        }
        echo "Digite o nó de destino: ";
        $destino = trim(fgets(STDIN));
        echo "Digite o peso da aresta: ";
        $peso = trim(fgets(STDIN));
        $grafo->adicionarAresta($origem, $destino, (int)$peso);
    }
}

do {
    $opcaoMenuPrincipal = menuPrincipal();

    switch ($opcaoMenuPrincipal) {
        case '1':
            $grafo = criarGrafo();
            if ($grafo) {
                // A função `criarGrafo` já lida com o menu específico do grafo.
            }
            break;
        case '2':
            echo "Saindo...\n";
            break;
        default:
            echo "Opção inválida. Tente novamente.\n";
            break;
    }
} while ($opcaoMenuPrincipal !== '2');

?>
