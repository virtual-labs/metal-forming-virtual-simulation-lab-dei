
module counter(clock,out);
input clock;
output reg out;
reg a,b;
always @(posedge clock)
begin
a=1;
b=0;
out=a || b;
end
endmodule

                        
