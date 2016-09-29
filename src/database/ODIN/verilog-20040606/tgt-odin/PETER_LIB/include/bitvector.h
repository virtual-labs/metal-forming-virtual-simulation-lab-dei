/*  Bit Vector Definitions */

#ifndef BITVECTOR_H
#define BITVECTOR_H

#include "lib_includes.h"

/*  Bit vectors are stored in arrays of unsigned integers.  The bits are
    numbered beginning with 0.  */
    
typedef int boolean;   

typedef struct bit_vector_struct {
    int num_bits;
    unsigned *bits;
} bit_vector;

typedef void (*bitprint_f)(FILE *fd, int bit);

extern bit_vector *new_bit_vector(int num_bits);
extern void set_bit(bit_vector *b, int ndx, boolean value);
extern boolean get_bit(bit_vector *b, int ndx);
extern void set_all_bits(bit_vector *b, boolean value);
extern void subtract_bits(bit_vector *b, bit_vector *c);
extern void and_bits(bit_vector *b, bit_vector *c);
extern void or_bits(bit_vector *b, bit_vector *c);
extern void not_bits (bit_vector *b);
extern void swap_vectors (bit_vector *b, bit_vector *c);
extern void copy_bits(bit_vector *b, bit_vector *c);
extern boolean bits_are_equal(bit_vector *b, bit_vector *c);
extern boolean bits_are_false(bit_vector *b);
extern boolean bits_are_true (bit_vector *b);
extern void fprint_bits(FILE *fd, bit_vector *b, bitprint_f bitprint);
extern void fprint_bits_out(FILE *fd, bit_vector *b, bitprint_f bitprint);
extern void fprint_bit(FILE *fd, int bit);
extern void free_bit_vector(bit_vector *b);

#endif /* BITVECTOR_H */
