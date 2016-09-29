module 	bm_base_multiply(clock, 
		reset_n, 
		a_in, 
		b_in,
		c_in, 
		d_in, 
		e_in,
		f_in,
		out0,
		out2,
		out3,
		out4,
		out1);

// SIGNAL DECLARATIONS
input	clock;
input 	reset_n;

input [8-1:0] a_in;
input [8-1:0] b_in;
input [8-1:0] c_in;
input [8-1:0] d_in;
input [8-1:0] e_in;
input [8-2:0] f_in;

output [16-1:0] out0;
output [16-1:0] out1;
output [16-1:0] out2;
output [14:0] out3;
output [14:0] out4;

reg [16-1:0]    out0;
wire [16-1:0]    out1;
reg [16-1:0]    out2;
reg [14:0] out3;
wire [14:0] out4;

wire [8-1:0] temp_a;
wire [8-1:0] temp_b;
wire temp_c;
wire temp_d;

a top_a(clock, a_in, b_in, temp_a);
b top_b(clock, a_in, b_in, temp_b);

always @(posedge clock or negedge reset_n)
begin
	out0 <= a_in * b_in;
	out2 <= temp_a & temp_b;
	out3 <= e_in * f_in;
end

assign out1 = c_in * d_in;
assign out4 = f_in * e_in;

endmodule

/*---------------------------------------------------------*/
module a(clock,
		a_in,
		b_in,
		out);

input	clock;
input [8-1:0] a_in;
input [8-1:0] b_in;
output [8-1:0]    out;
reg [8-1:0]    out;

always @(posedge clock)
begin
	out <= a_in & b_in;
end

endmodule

/*---------------------------------------------------------*/
module b(clock,
		a_in,
		b_in,
		out);

input	clock;
input [8-1:0] a_in;
input [8-1:0] b_in;
wire [8-1:0] temp;
output [8-1:0] out;
reg [8-1:0] out;

a my_a(clock, a_in, b_in, temp);

always @(posedge clock)
begin
	out <= a_in & temp;
end

endmodule
