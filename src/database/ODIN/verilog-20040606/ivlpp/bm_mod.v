// DEFINES
`define BITS 8       // Bit width of the operands

module 	bm_mode(clock, 
		reset_n, 
		out0);

// SIGNAL DECLARATIONS
input	clock;
input 	reset_n;

output [`BITS-1:0] out0;


reg [`BITS-1:0]    out0;


always @(posedge clock)
begin
	out0 <= out0 + 1;
	if(out0==10)
	out0<=0;
	if(reset_n==1)
	out0<=0;
end

endmodule

