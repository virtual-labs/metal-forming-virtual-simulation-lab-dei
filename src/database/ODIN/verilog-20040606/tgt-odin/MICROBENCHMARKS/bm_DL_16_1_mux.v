/* Pg 325 - 16 to 1 multiplexer */

module bm_DL_16_1_mux (W, S16, f);
	input [0:15] W;
	input [3:0] S16;
	output f;
	wire [0:3] M;

	mux4to1 Mux1 (W[0:3], S16[1:0], M[0]);
	mux4to1 Mux2 (W[4:7], S16[1:0], M[1]);
	mux4to1 Mux3 (W[8:11], S16[1:0], M[2]);
	mux4to1 Mux4 (W[12:15], S16[1:0], M[3]);
	mux4to1 Mux5 (M[0:3], S16[3:2], f);
		 
endmodule

module mux4to1 (W, S, f);
	input [0:3] W;
	input [1:0] S;
	output f;
	reg f;
	
	always @(W or S)
		if (S == 0)
			f = W[0];
		else if (S == 1)
			f = W[1];
		else if (S == 2)
			f = W[2];
		else if (S == 3)
			f = W[3];
		
endmodule
