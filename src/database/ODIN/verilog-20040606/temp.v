module counter(clk,reset,out);
input clk;
input reset;
output reg [7:0] out;
always @(posedge clk)
begin
out=out+1;
if(out==10)
out=0;
if(reset==1)
out=0;
end
endmodule

                        
