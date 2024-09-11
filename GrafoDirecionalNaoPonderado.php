<?php

class GrafoDirecionalNaoPonderado {
    private array $adjacencias;
    private array $nos;
    private array $visitado;
    private array $descoberta;
    private array $finalizacao;
    private int $tempo;

    public function __construct(array $nos) {
        $this->nos = $nos;
        $this->adjacencias = array_fill_keys($nos, []);
        $this->visitado = array_fill_keys($nos, false);
        $this->descoberta = array_fill_keys($nos, 0);
        $this->finalizacao = array_fill_keys($nos, 0);
        $this->tempo = 0;
    }

    public function getNos(): array {
        return $this->nos;
    }

    public function adicionarAresta(string $origem, string $destino): void {
        if (!in_array($origem, $this->nos) || !in_array($destino, $this->nos)) {
            echo "Erro: Origem ou destino inválido.\n";
            return;
        }
        $this->adjacencias[$origem][] = $destino;
    }

    public function imprimirGrafo(): void {
        echo "Tipo do Grafo: Grafo direcional não ponderado\n";
        foreach ($this->adjacencias as $origem => $destinos) {
            echo $origem . " (";
            foreach ($destinos as $destino) {
                echo " -> " . $destino;
            }
            echo ")\n";
        }
    }

    public function ordenacaoTopologica(): void {
        $pilha = [];
        $nosSemDependencia = $this->encontrarNosSemDependencia();

        while (!empty($nosSemDependencia)) {
            echo "Nós sem dependência: " . implode(', ', $nosSemDependencia) . "\n";
            echo "Escolha um nó para iniciar a busca: ";
            $inicio = trim(fgets(STDIN));

            if (!in_array($inicio, $nosSemDependencia)) {
                echo "Nó inválido.\n";
                continue;
            }

            $this->dfsOrdenacaoTopologica($inicio, $pilha);

            $nosSemDependencia = array_diff($nosSemDependencia, [$inicio]);
            if (empty($nosSemDependencia)) {
                foreach ($this->nos as $no) {
                    if (!$this->visitado[$no]) {
                        $nosSemDependencia[] = $no;
                    }
                }
            }
        }

        echo "Ordenação topológica: " . implode(' -> ', array_reverse($pilha)) . "\n";
    }

    private function dfsOrdenacaoTopologica(string $no, array &$pilha): void {
        $this->visitado[$no] = true;
        $this->tempo++;
        $this->descoberta[$no] = $this->tempo;

        foreach ($this->adjacencias[$no] as $vizinho) {
            if (!$this->visitado[$vizinho]) {
                $this->dfsOrdenacaoTopologica($vizinho, $pilha);
            }
        }

        $this->tempo++;
        $this->finalizacao[$no] = $this->tempo;
        $pilha[] = $no;
    }

    public function imprimirOrdenacaoTopologica(): void {
        $this->ordenacaoTopologica();
        echo "Ordenação topológica:\n";
        foreach ($this->descoberta as $no => $tempo) {
            echo "$no: ({$this->descoberta[$no]}/{$this->finalizacao[$no]})\n";
        }
    }

    public function imprimirDescobertaFinalizacaoGrafo(): void {
        echo "G - Ordem de Descoberta e Finalização:\n";
        foreach ($this->descoberta as $no => $tempo) {
            echo "$no: ({$this->descoberta[$no]}/{$this->finalizacao[$no]})\n";
        }
    }

    public function imprimirDescobertaFinalizacaoTransposto(): void {
        echo "GT - Ordem de Descoberta e Finalização:\n";
        foreach ($this->nos as $no) {
            echo "$no: (" . $this->descoberta[$no] . "/" . $this->finalizacao[$no] . ")\n";
        }
    }

    private function transporGrafo(): GrafoDirecionalNaoPonderado {
        $grafoTransposto = new GrafoDirecionalNaoPonderado($this->nos);
        
        foreach ($this->nos as $no) {
            foreach ($this->adjacencias[$no] as $vizinho) {
                $grafoTransposto->adicionarAresta($vizinho, $no); // Inverta as arestas
            }
        }
        
        return $grafoTransposto;
    }

    public function encontrarComponentesFortementeConectados(): void {
        // Etapa 1: Realiza a primeira DFS para obter a ordem de finalização
        $pilha = [];
        foreach ($this->nos as $no) {
            if (!$this->visitado[$no]) {
                $this->dfsOrdenacaoTopologica($no, $pilha);
            }
        }

        // Etapa 2: Transpõe o grafo
        $grafoTransposto = $this->transporGrafo();

        // Etapa 3: Inicializa variáveis no grafo transposto
        $grafoTransposto->visitado = array_fill_keys($this->nos, false);

        // Etapa 4: Realiza a DFS no grafo transposto na ordem inversa da finalização
        $componentes = [];
        while (!empty($pilha)) {
            $no = array_pop($pilha);
            if (!$grafoTransposto->visitado[$no]) {
                $componente = [];
                $grafoTransposto->dfsParaTransposto($no, $componente);
                $componentes[] = $componente;
            }
        }

        // Imprime os componentes fortemente conectados
        echo "Componentes fortemente conectados:\n";
        foreach ($componentes as $componente) {
            echo "{ " . implode(", ", $componente) . " }\n";
        }

        $this->imprimirDescobertaFinalizacaoGrafo();
        $this->imprimirDescobertaFinalizacaoTransposto();
    }

    private function dfsParaTransposto(string $no, array &$componente): void {
        $this->visitado[$no] = true;
        $componente[] = $no;

        foreach ($this->adjacencias[$no] as $vizinho) {
            if (!$this->visitado[$vizinho]) {
                $this->dfsParaTransposto($vizinho, $componente);
            }
        }
    }

    private function encontrarNosSemDependencia(): array {
        $grafoInvertido = [];
        foreach ($this->nos as $no) {
            foreach ($this->adjacencias[$no] as $vizinho) {
                if (!isset($grafoInvertido[$vizinho])) {
                    $grafoInvertido[$vizinho] = [];
                }
                $grafoInvertido[$vizinho][] = $no;
            }
        }

        $nosSemDependencia = [];
        foreach ($this->nos as $no) {
            if (empty($grafoInvertido[$no])) {
                $nosSemDependencia[] = $no;
            }
        }
        return $nosSemDependencia;
    }
}
