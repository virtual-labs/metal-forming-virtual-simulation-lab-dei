/* pg 405 - up down counter */

module bm_DL_4_bit_updown_counter(R, Clock, L, E, up_down, Q);
	parameter n=2;
	input [n-1:0] R;
	input Clock, L, E, up_down;
	output [n-1:0] Q;
	reg [n-1:0] Q;
	reg [n-1:0] direction;
		
	always @(posedge Clock)
	 	begin
		if (up_down)
			direction <= 8'b00000001;
		else 
			direction <= 8'b11111111;
		if (L)
			Q <= R;
		else if (E)
			Q <= Q + direction;
		end
	
endmodule
