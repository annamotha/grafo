<?php

// class GrafoNaoDirecionalPonderado {
//     private array $adjacencias;
//     private array $nos;
//     private ?array $coordenadas; // Coordenadas para cálculo da heurística

//     public function __construct(array $nos, array $coordenadas = []) {
//         $this->nos = $nos;
//         $this->adjacencias = array_fill_keys($nos, []);
//         $this->coordenadas = $coordenadas;
//     }

//     public function adicionarAresta(string $origem, string $destino, int $peso): void {
//         if (!in_array($origem, $this->nos) || !in_array($destino, $this->nos)) {
//             echo "Erro: Origem ou destino inválido.\n";
//             return;
//         }

//         // Adiciona as conexões de ambos os lados, já que é um grafo não direcional
//         $this->adjacencias[$origem][$destino] = $peso;
//         $this->adjacencias[$destino][$origem] = $peso;
//     }

//     public function imprimirGrafo(): void {
//         echo "Tipo do Grafo: Grafo não direcional ponderado\n";
//         foreach ($this->adjacencias as $origem => $destinos) {
//             echo $origem . " (";
//             foreach ($destinos as $destino => $peso) {
//                 echo "$destino: $peso, ";
//             }
//             echo ")\n";
//         }
//     }

//     public function dijkstra(string $inicio, string $fim): void {
//         $distancias = array_fill_keys($this->nos, INF);
//         $anteriores = array_fill_keys($this->nos, null);
//         $visitado = array_fill_keys($this->nos, false);

//         $distancias[$inicio] = 0;

//         $tabelaControle = [];

//         while (true) {
//             $u = $this->encontrarMenorDistancia($distancias, $visitado);
//             if ($u === null) break;

//             $visitado[$u] = true;

//             foreach ($this->adjacencias[$u] as $v => $peso) {
//                 if (!$visitado[$v]) {
//                     $novaDistancia = $distancias[$u] + $peso;
//                     if ($novaDistancia < $distancias[$v]) {
//                         $distancias[$v] = $novaDistancia;
//                         $anteriores[$v] = $u;
//                     }
//                 }
//             }

//             $tabelaControle[] = $this->formatarTabelaControle($distancias, $anteriores, $u);
//         }

//         $this->imprimirTabelaControle($tabelaControle);
//         $this->imprimirCaminhoMinimo($inicio, $fim, $anteriores);
//     }

//     private function encontrarMenorDistancia(array $distancias, array $visitado): ?string {
//         $menorDistancia = INF;
//         $menorNo = null;

//         foreach ($distancias as $no => $distancia) {
//             if (!$visitado[$no] && $distancia < $menorDistancia) {
//                 $menorDistancia = $distancia;
//                 $menorNo = $no;
//             }
//         }

//         return $menorNo;
//     }

//     private function formatarTabelaControle(array $distancias, array $anteriores, string $u): array {
//         $linha = ['u' => $u];
//         foreach ($this->nos as $no) {
//             $linha[$no] = $distancias[$no] === INF ? '∞' : $distancias[$no];
//         }
//         return $linha;
//     }

//     private function imprimirTabelaControle(array $tabelaControle): void {
//         echo "Tabela de Controle a cada escolha gulosa:\n";
//         echo "    | " . implode(" | ", array_keys($tabelaControle[0])) . " |\n";
//         foreach ($tabelaControle as $linha) {
//             echo $linha['u'] . " | " . implode(" | ", array_slice($linha, 1)) . " |\n";
//         }
//     }

//     private function imprimirCaminhoMinimo(string $inicio, string $fim, array $anteriores): void {
//         $caminho = [];
//         for ($no = $fim; $no !== null; $no = $anteriores[$no]) {
//             array_unshift($caminho, $no);
//         }

//         echo "Caminho mínimo entre $inicio e $fim: " . implode(' -> ', $caminho) . "\n";
//     }

//     public function aEstrela(string $inicio, string $fim): void {
//         if ($this->coordenadas === null) {
//             echo "Erro: Coordenadas não fornecidas para o cálculo da heurística.\n";
//             return;
//         }

//         // Inicializa listas abertas, fechadas e as tabelas G, H e F
//         $aberta = [$inicio];
//         $fechada = [];
//         $g = array_fill_keys($this->nos, INF);
//         $h = array_fill_keys($this->nos, INF);
//         $f = array_fill_keys($this->nos, INF);
//         $g[$inicio] = 0;
//         $h[$inicio] = $this->calcularHeuristica($inicio, $fim);
//         $f[$inicio] = $h[$inicio];

//         $pai = array_fill_keys($this->nos, null);

//         while (!empty($aberta)) {
//             // Escolhe o nó com o menor valor de F na lista aberta
//             $atual = $this->menorF($aberta, $f);
//             if ($atual === $fim) {
//                 $this->imprimirCaminho($pai, $inicio, $fim);
//                 return;
//             }

//             // Move o nó atual da lista aberta para a lista fechada
//             $aberta = array_diff($aberta, [$atual]);
//             $fechada[] = $atual;

//             foreach ($this->adjacencias[$atual] as $vizinho => $peso) {
//                 if (in_array($vizinho, $fechada)) {
//                     continue; // Nó já processado
//                 }

//                 $gNovo = $g[$atual] + $peso;

//                 if (!in_array($vizinho, $aberta)) {
//                     $aberta[] = $vizinho;
//                 } elseif ($gNovo >= $g[$vizinho]) {
//                     continue; // Esse não é o melhor caminho
//                 }

//                 // Atualiza os valores de G, H e F
//                 $pai[$vizinho] = $atual;
//                 $g[$vizinho] = $gNovo;
//                 $h[$vizinho] = $this->calcularHeuristica($vizinho, $fim);
//                 $f[$vizinho] = $g[$vizinho] + $h[$vizinho];
//             }

//             // Imprime as listas abertas e fechadas e a tabela de controle
//             $this->imprimirListas($aberta, $fechada, $f, $pai);
//         }

//         echo "Caminho não encontrado.\n";
//     }

//     private function calcularHeuristica(string $no, string $fim): float {
//         $dx = $this->coordenadas[$no][0] - $this->coordenadas[$fim][0];
//         $dy = $this->coordenadas[$no][1] - $this->coordenadas[$fim][1];
//         return sqrt($dx * $dx + $dy * $dy);
//     }

//     private function menorF(array $aberta, array $f): string {
//         $menor = INF;
//         $menorNo = null;
//         foreach ($aberta as $no) {
//             if ($f[$no] < $menor) {
//                 $menor = $f[$no];
//                 $menorNo = $no;
//             }
//         }
//         return $menorNo;
//     }

//     private function imprimirListas(array $aberta, array $fechada, array $f, array $pai): void {
//         echo "Lista aberta: " . implode(" | ", $aberta) . "\n";
//         echo "Lista fechada: " . implode(" | ", $fechada) . "\n";
//         echo "Tabela de controle:\n";
//         echo "    | " . implode(" | ", array_keys($f)) . " |\n";
//         echo "F(a) | " . implode(" | ", array_map(function ($valor) {
//             return $valor === INF ? '∞' : $valor;
//         }, $f)) . " |\n";
//         echo "Pai  | " . implode(" | ", array_map(function ($p) {
//             return $p ?? '-';
//         }, $pai)) . " |\n";
//     }

//     private function imprimirCaminho(array $pai, string $inicio, string $fim): void {
//         $caminho = [];
//         for ($no = $fim; $no !== null; $no = $pai[$no]) {
//             array_unshift($caminho, $no);
//         }

//         echo "Caminho encontrado entre $inicio e $fim: " . implode(' -> ', $caminho) . "\n";
//     }
// }

// class GrafoNaoDirecionalPonderado {
//     private array $adjacencias;
//     private array $nos;
//     private ?array $coordenadas; // Coordenadas para cálculo da heurística

//     public function __construct(array $nos, array $coordenadas = []) {
//         $this->nos = $nos;
//         $this->adjacencias = array_fill_keys($nos, []);
//         $this->coordenadas = $coordenadas;
//     }

//     public function adicionarAresta(string $origem, string $destino, int $peso): void {
//         if (!in_array($origem, $this->nos) || !in_array($destino, $this->nos)) {
//             echo "Erro: Origem ou destino inválido.\n";
//             return;
//         }

//         // Adiciona as conexões de ambos os lados, já que é um grafo não direcional
//         $this->adjacencias[$origem][$destino] = $peso;
//         $this->adjacencias[$destino][$origem] = $peso;
//     }

//     public function imprimirGrafo(): void {
//         echo "Tipo do Grafo: Grafo não direcional ponderado\n";
//         foreach ($this->adjacencias as $origem => $destinos) {
//             echo $origem . " (";
//             foreach ($destinos as $destino => $peso) {
//                 echo "$destino: $peso, ";
//             }
//             echo ")\n";
//         }
//     }

//     public function dijkstra(string $inicio, string $fim): void {
//         $distancias = array_fill_keys($this->nos, INF);
//         $anteriores = array_fill_keys($this->nos, null);
//         $visitado = array_fill_keys($this->nos, false);

//         $distancias[$inicio] = 0;

//         $tabelaControle = [];

//         while (true) {
//             $u = $this->encontrarMenorDistancia($distancias, $visitado);
//             if ($u === null) break;

//             $visitado[$u] = true;

//             foreach ($this->adjacencias[$u] as $v => $peso) {
//                 if (!$visitado[$v]) {
//                     $novaDistancia = $distancias[$u] + $peso;
//                     if ($novaDistancia < $distancias[$v]) {
//                         $distancias[$v] = $novaDistancia;
//                         $anteriores[$v] = $u;
//                     }
//                 }
//             }

//             $tabelaControle[] = $this->formatarTabelaControle($distancias, $anteriores, $u);
//         }

//         $this->imprimirTabelaControle($tabelaControle);
//         $this->imprimirCaminhoMinimo($inicio, $fim, $anteriores);
//     }

//     private function encontrarMenorDistancia(array $distancias, array $visitado): ?string {
//         $menorDistancia = INF;
//         $menorNo = null;

//         foreach ($distancias as $no => $distancia) {
//             if (!$visitado[$no] && $distancia < $menorDistancia) {
//                 $menorDistancia = $distancia;
//                 $menorNo = $no;
//             }
//         }

//         return $menorNo;
//     }

//     private function formatarTabelaControle(array $distancias, array $anteriores, string $u): array {
//         $linha = ['u' => $u];
//         foreach ($this->nos as $no) {
//             $linha[$no] = $distancias[$no] === INF ? '∞' : $distancias[$no];
//         }
//         return $linha;
//     }

//     private function imprimirTabelaControle(array $tabelaControle): void {
//         echo "Tabela de Controle a cada escolha gulosa:\n";
//         echo "    | " . implode(" | ", array_keys($tabelaControle[0])) . " |\n";
//         foreach ($tabelaControle as $linha) {
//             echo $linha['u'] . " | " . implode(" | ", array_slice($linha, 1)) . " |\n";
//         }
//     }

//     private function imprimirCaminhoMinimo(string $inicio, string $fim, array $anteriores): void {
//         $caminho = [];
//         for ($no = $fim; $no !== null; $no = $anteriores[$no]) {
//             array_unshift($caminho, $no);
//         }

//         echo "Caminho mínimo entre $inicio e $fim: " . implode(' -> ', $caminho) . "\n";
//     }

//     public function aEstrela(string $inicio, string $fim): void {
//         if ($this->coordenadas === null) {
//             echo "Erro: Coordenadas não fornecidas para o cálculo da heurística.\n";
//             return;
//         }

//         // Inicializa listas abertas, fechadas e as tabelas G, H e F
//         $aberta = [$inicio];
//         $fechada = [];
//         $g = array_fill_keys($this->nos, INF);
//         $h = array_fill_keys($this->nos, INF);
//         $f = array_fill_keys($this->nos, INF);
//         $g[$inicio] = 0;
//         $h[$inicio] = $this->calcularHeuristica($inicio, $fim);
//         $f[$inicio] = $h[$inicio];

//         $pai = array_fill_keys($this->nos, null);

//         while (!empty($aberta)) {
//             // Escolhe o nó com o menor valor de F na lista aberta
//             $atual = $this->menorF($aberta, $f);
//             if ($atual === $fim) {
//                 $this->imprimirCaminho($pai, $inicio, $fim);
//                 return;
//             }

//             // Move o nó atual da lista aberta para a lista fechada
//             $aberta = array_diff($aberta, [$atual]);
//             $fechada[] = $atual;

//             foreach ($this->adjacencias[$atual] as $vizinho => $peso) {
//                 if (in_array($vizinho, $fechada)) {
//                     continue; // Nó já processado
//                 }

//                 $gNovo = $g[$atual] + $peso;

//                 if (!in_array($vizinho, $aberta)) {
//                     $aberta[] = $vizinho;
//                 } elseif ($gNovo >= $g[$vizinho]) {
//                     continue; // Esse não é o melhor caminho
//                 }

//                 // Atualiza os valores de G, H e F
//                 $pai[$vizinho] = $atual;
//                 $g[$vizinho] = $gNovo;
//                 $h[$vizinho] = $this->calcularHeuristica($vizinho, $fim);
//                 $f[$vizinho] = $g[$vizinho] + $h[$vizinho];
//             }

//             // Imprime as listas abertas e fechadas e a tabela de controle
//             $this->imprimirListas($aberta, $fechada, $f, $pai);
//         }

//         echo "Caminho não encontrado.\n";
//     }

//     private function calcularHeuristica(string $no, string $fim): float {
//         $dx = $this->coordenadas[$no][0] - $this->coordenadas[$fim][0];
//         $dy = $this->coordenadas[$no][1] - $this->coordenadas[$fim][1];
//         return sqrt($dx * $dx + $dy * $dy);
//     }

//     private function menorF(array $aberta, array $f): string {
//         $menor = INF;
//         $menorNo = null;
//         foreach ($aberta as $no) {
//             if ($f[$no] < $menor) {
//                 $menor = $f[$no];
//                 $menorNo = $no;
//             }
//         }
//         return $menorNo;
//     }

//     private function imprimirListas(array $aberta, array $fechada, array $f, array $pai): void {
//         echo "Lista aberta: " . implode(" | ", $aberta) . "\n";
//         echo "Lista fechada: " . implode(" | ", $fechada) . "\n";
//         echo "Tabela de controle:\n";
//         echo "    | " . implode(" | ", array_keys($f)) . " |\n";
//         echo "F(a) | " . implode(" | ", array_map(function ($valor) {
//             return $valor === INF ? '∞' : $valor;
//         }, $f)) . " |\n";
//         echo "Pai  | " . implode(" | ", array_map(function ($p) {
//             return $p ?? '-';
//         }, $pai)) . " |\n";
//     }

//     private function imprimirCaminho(array $pai, string $inicio, string $fim): void {
//         $caminho = [];
//         for ($no = $fim; $no !== null; $no = $pai[$no]) {
//             array_unshift($caminho, $no);
//         }

//         echo "Caminho encontrado entre $inicio e $fim: " . implode(' -> ', $caminho) . "\n";
//     }
// }

// ?>

<?php

class GrafoNaoDirecionalPonderado {
    private $nos = [];
    private $arestas = [];
    private $heuristicas = [];

    // Construtor da classe
    public function __construct(array $nos) {
        $this->nos = $nos;
        $this->arestas = [];
        $this->heuristicas = [];
    }

    // Adiciona uma aresta ao grafo
    public function adicionarAresta($origem, $destino, $peso) {
        $this->arestas[$origem][$destino] = $peso;
        $this->arestas[$destino][$origem] = $peso; // Grafo não direcionado
    }

    // Define heurísticas para os nós
    public function setHeuristicas(array $heuristicas) {
        $this->heuristicas = $heuristicas;
    }

    // Imprime o grafo
    public function imprimirGrafo() {
        echo "Grafo:\n";
        foreach ($this->arestas as $noOrigem => $arestas) {
            foreach ($arestas as $noDestino => $peso) {
                echo "$noOrigem --($peso)--> $noDestino\n";
            }
        }
    }

    // Executa o algoritmo de Dijkstra
    public function dijkstra($inicio, $fim) {
        $distancias = [];
        $anterior = [];
        $visitados = [];
        $nos = $this->nos;

        foreach ($nos as $no) {
            $distancias[$no] = INF;
            $anterior[$no] = null;
            $visitados[$no] = false;
        }

        $distancias[$inicio] = 0;

        while (true) {
            $minDist = INF;
            $noAtual = null;

            foreach ($nos as $no) {
                if (!$visitados[$no] && $distancias[$no] < $minDist) {
                    $minDist = $distancias[$no];
                    $noAtual = $no;
                }
            }

            if ($noAtual === null) break;
            if ($noAtual === $fim) break;

            $visitados[$noAtual] = true;

            foreach ($this->arestas[$noAtual] as $vizinho => $peso) {
                if ($visitados[$vizinho]) continue;
                $novaDistancia = $distancias[$noAtual] + $peso;
                if ($novaDistancia < $distancias[$vizinho]) {
                    $distancias[$vizinho] = $novaDistancia;
                    $anterior[$vizinho] = $noAtual;
                }
            }
        }

        // Imprime o caminho
        $caminho = [];
        $atual = $fim;
        while ($atual !== null) {
            array_unshift($caminho, $atual);
            $atual = $anterior[$atual];
        }

        echo "Caminho de $inicio a $fim: " . implode(' -> ', $caminho) . "\n";
        echo "Distância: " . $distancias[$fim] . "\n";
    }

    // Executa o algoritmo A*
    public function aEstrela($inicio, $fim) {
        $abertos = [];
        $fechados = [];
        $distancias = [];
        $heuristicas = $this->heuristicas;
        $anterior = [];

        foreach ($this->nos as $no) {
            $distancias[$no] = INF;
            $anterior[$no] = null;
            $abertos[$no] = INF;
        }

        $distancias[$inicio] = 0;
        $abertos[$inicio] = $distancias[$inicio] + $heuristicas[$inicio] ?? INF;

        while (!empty($abertos)) {
            $noAtual = $this->menorF($abertos);

            if ($noAtual === $fim) {
                break;
            }

            unset($abertos[$noAtual]);
            $fechados[$noAtual] = true;

            foreach ($this->arestas[$noAtual] as $vizinho => $peso) {
                if (isset($fechados[$vizinho])) continue;
                $tentativaDistancia = $distancias[$noAtual] + $peso;

                if ($tentativaDistancia < $distancias[$vizinho]) {
                    $distancias[$vizinho] = $tentativaDistancia;
                    $anterior[$vizinho] = $noAtual;
                    $abertos[$vizinho] = $tentativaDistancia + ($heuristicas[$vizinho] ?? INF);
                }
            }
        }

        if (!isset($fechados[$fim])) {
            echo "Caminho não encontrado.\n";
            return;
        }

        // Imprime o caminho
        $caminho = [];
        $atual = $fim;
        while ($atual !== null) {
            array_unshift($caminho, $atual);
            $atual = $anterior[$atual];
        }

        echo "Caminho de $inicio a $fim: " . implode(' -> ', $caminho) . "\n";
        echo "Distância: " . $distancias[$fim] . "\n";
    }

    // Retorna o nó com o menor valor de f
    private function menorF($abertos) {
        $menorNo = null;
        $menorValor = INF;

        foreach ($abertos as $no => $valor) {
            if ($valor < $menorValor) {
                $menorValor = $valor;
                $menorNo = $no;
            }
        }

        if ($menorNo === null) {
            throw new RuntimeException("Não há nós na lista aberta para processar.");
        }

        return $menorNo;
    }
}

?>
