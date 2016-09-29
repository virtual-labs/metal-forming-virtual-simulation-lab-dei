/* pg 328 - 4 to 16 decoder */

module bm_DL_4_16_encoder(W, Y, En);
	input [3:0] W;
	input En;
	output [0:15] Y;
	wire [0:3] M;
	
	dec2to4 Dec1 (W[3:2], M[0:3], En);
	dec2to4 Dec2 (W[1:0], Y[0:3], M[0]);
	dec2to4 Dec3 (W[1:0], Y[4:7], M[1]);
	dec2to4 Dec4 (W[1:0], Y[8:11], M[2]);
	dec2to4 Dec5 (W[1:0], Y[12:15], M[3]);

endmodule

module dec2to4(W, Y, En);
	input [1:0] W;
	input En;
	output [0:3] Y;
	reg [0:3] Y;
	
	always @(W or En)
		case ({En, W})
			3'b100: Y = 4'b1000;
			3'b101: Y = 4'b0100;
			3'b110: Y = 4'b0010;
			3'b111: Y = 4'b0001;
			default: Y = 4'b0000;
		endcase
	
endmodule
