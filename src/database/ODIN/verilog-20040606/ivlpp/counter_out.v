module counter(clock,n_out);
input clock;
output reg n_out;
reg a_out,b_out;
always @(posedge clock)
begin
a_out=1;
b_out=0;
n_out<=a_out;
end
endmodule
                        
