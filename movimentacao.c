#include <stdio.h>
#include <string.h>
#define MAX 2

/* Estrutra para armazenar a ficha do produto*/

struct cadastro
{
     int cod; /* Código do produto*/ 
     char nome[50]; /* Nome do produto*/ 
     float preco; /* Salario do produto*/      
     int quantidade; /* idade do produto*/
};

struct cadastro produto[MAX];
int topo;
void inserir();
void excluir();
void listar();
void pesquisar();
void alterar();

int main()
{
      int opcao;
      char seguir = 's';
      
      topo = 0;
      
      while(seguir == 's')
      {
      printf(" - Cadastro de produtos - \n\n");
      printf(" 1) NOVO \n");
      printf(" 2) REMOVER \n");
      printf(" 3) LISTAR \n");
      printf(" 4) PESQUISAR \n");
      printf(" 5) ALTERAR \n\n");
      printf(" Digite sua opcao: ");
      scanf("%d%*c",&opcao);
      printf("\n");
      
      switch(opcao)
      {
        case 1:
             {
               printf(" INSERINDO NOVO REGISTRO \n\n");
               if(topo < MAX)
               {
                 inserir();
                 printf(" PRODUTO INSERIDO COM SUCESSO!\n\n");
               }
               else
               {
                 printf(" Desculpe, Sitema de Cadastro esta no limite!\n\n");
               }
               break;
             }
               
        case 2:
             {
               if(topo == 0)
               {
                 printf("não há dados a serem excluidos!\n\n");
               }
               else
               {
                 excluir();
                 printf(" DADO EXCLUIDO COM SUCESSO!\n\n");
               }
               break;
             }
        case 3:
             {
               if(topo == 0)
               {
                 printf("Não há registros no sistema!\n\n");
               }
               else
               {
                 printf(" Listando os produtos cadastrados\n\n");
                 listar();
               }
               break;
             }
        case 4:
             {
               if(topo == 0)
               {
                 printf("Não há registros no sistema!\n\n");
               }
               else
               {   
                 printf(" PESQUIZANDO DADOS\n\n");
                 pesquisar();
               }
               break;
             }
        case 5:
             {
               if(topo == 0)
               {
                 printf("Não há registros no sistema!\n\n");
               }
               else
               {
                 printf(" ALTERARANDO DADOS!\n\n");
                 alterar();
                 printf(" DADOS ALTERADOS COM SUCESSO!\n\n");
               }
               break;
             }
        default:
               printf(" ( OPCAO INVALIDA! )\n\n");
                             
        
        }
      printf(" CONTINUAR?(S/N) ");
      scanf("%c",&seguir);
      
      printf("\n");
      }


getchar();
return 0;

}

/* Funcao para inserir registros*/

void inserir()
{    
     produto[topo].cod = topo+1;
     printf(" CODIGO : %d\n",produto[topo].cod);
     
     printf(" Nome do produto: ");
     fgets(produto[topo].nome,50,stdin);
     produto[topo].nome[strlen(produto[topo].nome)];
    
     printf(" Preço: ");
     scanf("%f", &produto[topo].preco);
    
     printf(" Quantidade: ");
     scanf("%d", &produto[topo].quantidade);
     printf("\n");
     
     topo = topo + 1;
}

/*Excluir um produto do Sistema*/

void excluir()
{
     topo  = topo - 1;
}

/*Listar os produtos cadastrados no Sistema*/

void listar()
{
     int i;
     
     for(i = 0;i < topo; i++)
     {
           printf(" ARQUIVO %d\n",(i+1));
           printf(" CODIGO: %d",produto[i].cod);
           printf(" Nome do produto: %s",produto[i].nome);
           printf(" Preço: %f",produto[i].preco);           
           printf(" Quantidade: %d",produto[i].quantidade);
           printf("\n\n");
     }
}

/*Alterar os produtos cadastrados no Sistema*/

void alterar()
{
     int i,dado,cont = 0;

     printf(" EFETUE UMA PESQUIZA PELO SEU CODIGO. \n\n");
     printf(" CODIGO DO REGISTRO: ");
     scanf("%d",&dado);
     for(i = 0;i < topo; i++)
     {
       if(dado == produto[i].cod)
       {
         cont = cont + 1;
                  
          printf(" Nome do produto: ");
          fgets(produto[topo].nome,50,stdin);
          produto[topo].nome[strlen(produto[topo].nome)-1];;
    
          printf(" Preço: ");
          scanf("%f", &produto[topo].preco);

          printf(" Quantidade: ");
          scanf("%d", &produto[topo].quantidade);
         
       }
     }
     if(cont == 0)
     {
       printf(" DADO NÃO ENCONTRADO!\n\n"); 
     }
}

/*Pesquisar dados cadastrados no Sistema*/
void pesquisar()
{
     int i,dado,cont = 0;
     printf(" PESQUIZA POR CODIGO: ");
     scanf("%d",&dado);
     for(i = 0;i < topo; i++)
     {
       if(dado == produto[i].cod)
       {
          printf("Dado Encontrado \n\n");
          printf(" CODIGO: %d",produto[i].cod);
          printf(" Nome do produto: %s",produto[i].nome);
          printf(" Preço: %f",produto[i].preco);           
          printf(" Quantidade: %d",produto[i].quantidade);
          printf("\n");
         cont = cont + 1;
       }
     }
     if(cont == 0)
     {
       printf(" Registro não Encontrado!\n\n");
     }
}


// -> Crie o executável:
// gcc programa.c -o executavel

// -> Atribua permissão de execução:
// chmod +x executavel

// -> Execute:
// ./executavel