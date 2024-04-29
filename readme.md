## Memória e Garbage Collection em PHP
### Memória

Memory Stack x Memory Heap
A memória é dividida em duas partes: Stack e Heap. A Stack é uma pilha de memória que é alocada de forma estática. A Heap é uma pilha de memória que é alocada de forma dinâmica.
Podemos dizer que a Heap é como um restaurante onde você chega e solicita uma mesa para dois e conforme a disponibilidade.

Podemos destacar algumas diferenças entre a Stack e a Heap
Stack: 
- A memória é alocada de forma estática
- A memória é liberada automaticamente
- Acesso rápido
- Tamanho fixo
- Armazena variáveis locais de métodos

Heap:
- A memória é alocada de forma dinâmica
- A memória é liberada manualmente
- Acesso lento
- Tamanho variável
- Armazena objetos

### Memory Leak
Memory Leak é um problema que ocorre quando a memória é alocada e não é liberada. Isso pode ocorrer quando um objeto é criado e não é mais utilizado, mas a memória alocada para ele não é liberada. Isso pode causar problemas de desempenho e até mesmo travar o sistema.

### Garbage Collection

O Garbage Collection é um processo que é responsável por liberar a memória que não está mais em uso. É um processo que é executado pelo sistema operacional e é responsável por liberar a memória que não está mais em uso.

### PHP, ZVAL, Zend Engine

O PHP é uma linguagem de script que é interpretada pelo Zend Engine. O Zend Engine é responsável por interpretar o código PHP e executá-lo.
A Zend Engine tem esse conceito do ZVAL, é a união de todos diferentes tipos null, string, etc..., isso significa que o PHP aloca 128 bits para cada variável, independente do tipo dela.
O PHP usa a memória Heap na maioria das vezes. Se você criar um objeto ou um array em PHP, ele será alocado na memória Heap.

### Simple Assignment

```php
$name = 'John';
$clan = NULL;
$hitPoints = 100;
$inventory = ["sword", "shield"];
```

Stack -> Heap
```
name ZVAL 
clan ZVAL 
hitPoints ZVAL
inventory ZVAL
```

Heap
```
John
100
sword
shield
[
    0 -> ZVAL
    1 -> ZVAL
] 

```

```PHP
$a = "hammer";
$b = $a;
$c = $b;
```
Stack
```
a ZVAL
b ZVAL
c ZVAL
```
Heap
```
hammer
```

```PHP
$a = "hammer";
$b = $a;
$c = $b;
$b = "sword";
```

Stack
```
a ZVAL
b ZVAL
c ZVAL
b ZVAL
```
Heap
```
hammer
sword
```

### Assign by Reference

```PHP
$a = "hammer";
$b = &$a;
$c = &$b;
$b = "sword";
```

Stack 
```
a ZVAL
b ZVAL
c ZVAL
```
Heap
```
sword
```

### Dicas para otimizar a memória

- Evite criar muitos objetos/arrays
- Não overuse arrays
- unset variáveis que não estão mais em uso
- use pequenas fuções para permitir que o Garbage Collection libere a memória
- use o comando memory_get_usage() para monitorar o uso de memória
- use o comando memory_get_peak_usage() para monitorar o uso de memória máximo
-- use o comando gc_collect_cycles() para forçar a execução do Garbage Collection // pesquisar sobre
- Aprender sobre o uso da WeakReference::create() 

### Considerações finais

O Garbage COllection do PHP usa um algoritmo de coleta chamado de "ARC" (Automatic Reference Counting). O ARC é um algoritmo que é responsável por contar o número de referências para um objeto e liberar a memória quando o número de referências chega a zero.
Ele possui problemas com ciclos de referências, que ocorrem quando dois objetos se referenciam mutuamente. Isso pode causar vazamento de memória e travamento do sistema.
A memória é um recurso limitado e é importante otimizá-la para garantir o bom desempenho do sistema. É importante entender como a memória é alocada e liberada em PHP para evitar problemas de desempenho e travamentos do sistema.

