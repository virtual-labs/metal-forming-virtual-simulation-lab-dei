#ifndef _PETER_DEFS_H
#define _PETER_DEFS_H

#define TRUE 1
#define FALSE 0

#define MAX(a,b) ((a)>(b)?(a):(b))
#define MIN(a,b) ((a)<(b)?(a):(b))
#define ABS(a) ((a)>=0?(a):-(a))
#define SQR(x) ((x)*(x))
#define SIGN(x) ((x)==0?0:(x)<0?-1:1)
#define SIGN2(x,y) ((x)*SIGN(y))
#define IMPLIES(a,b) (!(a)||(b))

#define trapAssert(s)   {                       \
	        if (!(s)) {                     \
	                volatile int __i = 1;   \
                	printf("trapAssert failed (%s : %d): %s\n",  __FILE__, __LINE__, #s); \
			fflush(stdout);		\
			while (__i == 1);       \
			} 			\
		}
#endif 
