module counter(clk,reset,out);
input clk;
input reset;
output reg [7:0] out;
always @(posedge clk or negedge reset)
begin
if (reset == 1'b0)
out <= 7'd0;
else
begin
if (out == 7'd10)
out <= 7'd0;
else
out <= out+1'b1;
end
end
endmodule
