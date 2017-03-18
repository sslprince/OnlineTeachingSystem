//
//  main.c
//  test1
//
//  Created by LCC on 1/03/2017.
//  Copyright © 2017 LCC. All rights reserved.
//

#include <stdio.h>
int main(int argc, const char * argv[]) {
    // insert code here...
    float sn = 100.0;
    float hn = sn/2;
    int n;
   
        sn = sn+2*hn;
        hn = hn/2;
    n = hn * 2;
    printf("the total of road is %f\n",sn);
    printf("the tenth is %f meter\n",hn);
    return 0;
}
