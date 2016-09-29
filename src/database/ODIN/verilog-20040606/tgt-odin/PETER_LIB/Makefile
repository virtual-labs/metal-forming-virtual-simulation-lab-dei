SRC_DIR = src

AR = ar
CXX = gcc
CFLAGS = -O3 -finstrument-functions -Wall
#CFLAGS = -O3 -Wall
LIB_FLAGS = rcs
INCLUDES = -Iinclude 

LIB_OBJ = \
basic_funcs.o \
linked-list.o \
bitvector.o \
string_functions.o

all:libpeters.a 

libpeters.a:$(LIB_OBJ) 
	$(AR) $(LIB_FLAGS) $@ $(LIB_OBJ)
	cp $@ include

%.o:$(SRC_DIR)/%.c
	$(CXX) $(CFLAGS) $(INCLUDES) -c $< -o $@

clean :
	rm -f peters_lib
	rm -f *.o
