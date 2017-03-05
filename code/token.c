//
//  token.c
//  token
//
//  Created by LCC on 1/03/2017.
//  Copyright © 2017 LCC. All rights reserved.
//



#include<stdio.h>
#include<string.h>
#include <ctype.h>
int isvariable(char *p);
int is_digit(char *p);
int isfunctionname(char *p);
int variablenumber;
void token2();
char variable[100][100];
void delete(char *mystring,char *substr);
char *deletecommons(char*originaltoken1,char symbol,char symbol1);
char *rearrangetoken(char*originaltoken,char symbol);
char *deletecom(char*originaltoken1,char symbol);
int deletecom1(char*originaltoken1,char symbol);
char *deletecom2(char*originaltoken1,char symbol);
int alreadyexist(char token[100][100],char *token1);
void token1(){
    FILE *pFile;
    FILE *pFile1;
    char mystring[100];
    char c[]= " ";
    char *p;
    
  variablenumber = 0;
    //char varaible[100];
    pFile = fopen("test1.c","r");
    pFile1= fopen("test3.c","w+");
        if (pFile == NULL)
        perror ("Error opening file");
    else {
        while ( fgets (mystring , 100 , pFile) != NULL ){
            char *deleteexpression3;
            char *deleteexpression2;
            char *deleteexpression1;
            char *deleteexpression;
            
            deleteexpression3=deletecom(mystring,'/');
            deleteexpression2= deletecommons(deleteexpression3,'/','*');
           
            //fputs(mystring, pFile1);
           // fputs("lala\n",pFile1);
            //fflush(pFile1);
            //fclose(pFile1);
            deleteexpression1=deletecom2(deleteexpression2,';');
            deleteexpression1=deletecom2(deleteexpression1,'{');
            deleteexpression1=deletecom2(deleteexpression1,'}');
            deleteexpression=rearrangetoken(deleteexpression1,'"');
            if(deletecom1(mystring,'#')==0){
            p = strtok(deleteexpression,c);
            while(p){
                if(isvariable(p)==1&&is_digit(p)==1&&isfunctionname(p)==1){
                    int len = strlen(p);
                    
                    //printf("%lu\n",strlen(p));
                    int has = alreadyexist(variable,p);
                    if(has ==0 ){

                    for(int j = 0;j<len;j++){
                        variable[variablenumber][j]=p[j];
                        
                        //i++;
                        }
                        variable[variablenumber][len]='\0';
                        variablenumber++;
                    }
                   
                }
                
            p = strtok(NULL,c);
            }
            }
        }
        for(int k=0;k<variablenumber-1;k++){
            fputs(",", pFile1);
            fputs(variable[k], pFile1);
           
            //printf("%s\n",variable[k]);
        }
               //printf("%s\n",variable[i]);
    }
    fclose(pFile);
    fclose(pFile1);
 }

 int isvariable(char *p){
    if((strcmp(p,"main")!=0)&&(strcmp(p,"const")!=0)&&(strcmp(p,"function")!=0)&&(strcmp(p,"method")!=0)&&(strcmp(p,"field")!=0)&&(strcmp(p,"static")!=0)&&(strcmp(p,"var")!=0)&&(strcmp(p,"int")!=0)&&(strcmp(p,"char")!=0)&&(strcmp(p,"boolean")!=0)&&(strcmp(p,"void")!=0)&&(strcmp(p,"true")!=0)&&(strcmp(p,"false")!=0)&&(strcmp(p,"null")!=0)&&(strcmp(p,"this")!=0)&&(strcmp(p,"let")!=0)&&(strcmp(p,"do")!=0)&&(strcmp(p,"if")!=0)&&(strcmp(p,"else")!=0)&&(strcmp(p,"while")!=0)&&(strcmp(p,"return")!=0)&&(strcmp(p,"{")!=0)&&(strcmp(p,"}")!=0)&&(strcmp(p,"(")!=0)&&(strcmp(p,")")!=0)&&(strcmp(p,"[")!=0)&&(strcmp(p,"]")!=0)&&(strcmp(p,".")!=0)&&(strcmp(p,",")!=0)&&(strcmp(p,";")!=0)&&(strcmp(p,"+")!=0)&&(strcmp(p,"-")!=0)&&(strcmp(p,"*")!=0)&&(strcmp(p,"/")!=0)&&(strcmp(p,"&")!=0)&&(strcmp(p,"|")!=0)&&(strcmp(p,"<")!=0)&&(strcmp(p,">")!=0)&&(strcmp(p,"=")!=0)&&(strcmp(p,"~")!=0)&&(strcmp(p,"_")!=0)&&(strcmp(p,"float")!=0)&&(strcmp(p,"double")!=0)&&(strcmp(p,"<=")!=0)&&(strcmp(p,">=")!=0)&&(strcmp(p,"==")!=0)&&(strcmp(p,"!=")!=0)&&(strcmp(p,"printf")!=0)){
        return 1;
    }
    return 0;
}


int is_digit(char *p){
    int len = strlen(p);
    int j =0;
    for(int i =0;i<len;i++){
        if((p[i]<=57 && p[i]>=48) || (p[i]=='.'))  //0~9的ASCII码是48~57
        {j++;}  //找到数字了就数量++
    }
    //数字总数和字符串长度一样，则全是数字，总数为0，则都不是数字，在0~len之间则有部分是数字
    if (j==len){
        return 0;
    }
    
        return 1;
}

int isfunctionname(char *p){
    int len = strlen(p);
    int j = 0;
    for(int i = 0;i<len;i++){
        if(p[i]=='('){
            return 0;
        }
    }
    return 1;
}

char *rearrangetoken(char*originaltoken,char symbol){
    int string_length = 0;
    string_length = strlen(originaltoken);
    int count = 0;
    int begin_string=0;
    int end_string =0;
    char *deleteexpression;
    int notchange =0;
    for ( int i = 0;i<string_length-1;i++){
        if(originaltoken[i]==symbol&&count ==1){
            count =count +1;
            end_string = i;
            //printf("%d\n", end_string);
        }
        if(originaltoken[i]==symbol&&count == 0){
            count =count +1;
            begin_string = i;
            //printf("%d\n", begin_string);
            
        }
        if(count == 2){
            int a = begin_string-2;
            char *substr1=malloc(sizeof(char)*a);
            //printf("mm%d\n",strlen(substr1));
            int b =string_length-end_string;
            char substr2[string_length-end_string];
            for(int j=0;j<begin_string-1;j++){
                substr1[j]=originaltoken[j];
                //printf("lal %c\n",mystring[j]);
                //printf("nn %c\n",substr1[j]);
            }
            for(int j=0;j<string_length-end_string;j++){
                //
                substr2[j]=originaltoken[j+end_string+1];
                
            }
            
            //printf("%s\n",strcat(substr1,substr2));
            if(begin_string!=0){
                strcat(substr1,substr2);
            }
            else{
                substr1=substr2;
            }

            deleteexpression=substr1;
            //printf("oo%s\n",substr1);
            count =0;
            begin_string=0;
            end_string =0;
            notchange =1;
        }
        if(notchange == 0){
            deleteexpression=originaltoken;
        }
        if(count >=2){
            count =0;
            begin_string=0;
            end_string =0;
        }

    //char substr1[a];
   
   

}
    return  deleteexpression;
}
char *deletecommons(char*originaltoken1,char symbol,char symbol1){
    int string_length = 0;
    string_length = strlen(originaltoken1);
    int count = 0;
    int begin_string=0;
    int end_string =0;
    char *deleteexpression;
    int notchange =0;
    
    for ( int i = 0;i<string_length-1;i++){
        if(originaltoken1[i]==symbol1&&count ==1&&originaltoken1[i+1]=='/'){
            count =count +1;
            end_string = i;
            //printf("%d\n", end_string);
        }
        //printf("happy %c/d",originaltoken1[i],originaltoken1[i+1]);
        if(originaltoken1[i]==symbol&&count == 0&&originaltoken1[i+1]==symbol1){
            count =count +1;
            begin_string = i;
            //printf("lalala %d\n", begin_string);
            
        }
        if(count == 2){
            int a = begin_string-2;
            char *substr1=malloc(sizeof(char)*a);
            //printf("mm%d\n",strlen(substr1));
            int b =string_length-end_string;
            char substr2[string_length-end_string];
            for(int j=0;j<begin_string-1;j++){
                 //printf("lalala %s\n",substr1);
                substr1[j]=originaltoken1[j];
                //printf("lal %c\n",originaltoken1[j]);
               
            }
            for(int j=0;j<string_length-end_string;j++){
                //
                substr2[j]=originaltoken1[j+end_string+2];
                
            }
            
            
           /* if(begin_string==1){
                substr1=originaltoken1[0];
                printf("lalala ");
            }*/
           
            if(begin_string!=0){
                strcat(substr1,substr2);
            }
            else{
                substr1=substr2;
            }
            deleteexpression=substr1;
            //printf("oo%s\n",substr1);
            count =0;
            begin_string=0;
            end_string =0;
            notchange =1;
        }
        if(notchange == 0){
            deleteexpression=originaltoken1;
        }
        if(count >=2){
            count =0;
            begin_string=0;
            end_string =0;
        }
        
        //char substr1[a];
        
        
        
    }
    return  deleteexpression;
}

char *deletecom(char*originaltoken1,char symbol){
    int string_length = 0;
    string_length = strlen(originaltoken1);
    int count = 0;
    int begin_string=0;
    char *deleteexpression;
    int notchange =0;
    // printf("oo%c\n",originaltoken1[2]);
    // printf("oo%c\n",originaltoken1[3]);
    for ( int i = 0;i<string_length-1;i++){
        if(originaltoken1[i]==symbol&&originaltoken1[i+1]==symbol){
            count =count +1;
            begin_string = i;
            
            
        }
        //printf("lalala %d\n", begin_string);
        if(count == 1){
            int a = begin_string-1;
            char *substr1=malloc(sizeof(char)*a);
            //printf("mm%d\n",strlen(substr1));
            
            for(int j=0;j<begin_string-1;j++){
                substr1[j]=originaltoken1[j];
                //printf("lal %c\n",mystring[j]);
                //printf("nn %c\n",substr1[j]);
            }
            deleteexpression=substr1;
            
            
        }
        
    }
    //char substr1[a];
    
    if (count==0){
        deleteexpression=originaltoken1;
    }
    
    
    
    return  deleteexpression;
    
}



int deletecom1(char*originaltoken1,char symbol){
    int string_length = 0;
    string_length = strlen(originaltoken1);
    int count = 0;
    int begin_string=0;
    char *deleteexpression;
    int notchange =0;
    for ( int i = 0;i<string_length-1;i++){
        if(originaltoken1[i]==symbol){
            count =count +1;
            begin_string = i;
        }
    }
    return  count;
}

char *deletecom2(char*originaltoken1,char symbol){
    int string_length = 0;
    string_length = strlen(originaltoken1);
    int count = 0;
    int begin_string=0;
    char *deleteexpression;
    int notchange =0;
    // printf("oo%c\n",originaltoken1[2]);
    // printf("oo%c\n",originaltoken1[3]);
    for ( int i = 0;i<string_length-1;i++){
        if(originaltoken1[i]==symbol){
            count =count +1;
            begin_string = i;
            
            
        }
        //printf("lalala %d\n", begin_string);
        if(count == 1){
            int a = begin_string-1;
            char *substr1=malloc(sizeof(char)*a);
            //printf("mm%d\n",strlen(substr1));
            
            for(int j=0;j<begin_string-1;j++){
                substr1[j]=originaltoken1[j];
                //printf("lal %c\n",mystring[j]);
                //printf("nn %c\n",substr1[j]);
            }
            deleteexpression=substr1;
            
            
        }
        
    }
    //char substr1[a];
    
    if (count==0){
        deleteexpression=originaltoken1;
    }
    
    
    
    return  deleteexpression;
    
}

int alreadyexist(char token[100][100],char *token1){
    int have = 0;
    for(int i=0;i<100;i++){
        int count = 0;
        for(int j=0;j<strlen(token1);j++){
            if(token[i][j]==token1[j]){
                count ++;
            }
            if((count ==strlen(token1))&&(count ==strlen(token[i]))){
                have = 1;
            }
        }
    }
    
    return have;
}

void token2(){
    FILE *pFile;
    FILE *pFile1;
    FILE *pFile2;
    char mystring[100];
    char mstring[10000];
    char vnumber[2*variablenumber-2];
    char c[]= " ";
    char *p;
    
    int i = 0;
    //char varaible[100];
    pFile = fopen("test1.c","r");
    pFile1 = fopen("test2.c","w+");
    pFile2 = fopen("test3.c","r");
    if (pFile2 == NULL)
        perror ("Error opening file");
    else {
        fgets (mstring , 10000 , pFile2);
        //printf("%s\n",mstring);
    }
    printf("%d\n",variablenumber);
    for(int i=0;i<2*(variablenumber-1);i=i+2){
        vnumber[i]='%';
        vnumber[i+1]='s';
    }
    
    if (pFile == NULL)
        perror ("Error opening file");
    else {
        while ( fgets (mystring , 100 , pFile) != NULL ){
            
            fputs(mystring, pFile1);
            fputs("printf\"",pFile1);
            fputs(vnumber, pFile1);
            fputs("\\n",pFile1);
            fputs(mstring,pFile1);
            fputs(");\n",pFile1);
        }
    }
            //fflush(pFile1);
            //fclose(pFile1);
    fclose(pFile);
    fclose(pFile1);
}




