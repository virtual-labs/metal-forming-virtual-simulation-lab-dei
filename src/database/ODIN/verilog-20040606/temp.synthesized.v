module counter (
	counter_clk,
	counter_out,
	counter_reset);
input counter_clk;
output [7:0] counter_out;
input counter_reset;

wire gnd;
wire vcc;
assign gnd = 1'b0;
assign vcc = 1'b1;

wire hetero_REGISTER_7_125_out;
wire hetero_CMP_EQ_1_110_out;
wire hetero_CMP_EQ_1_110_118_out;
wire hetero_CMP_EQ_1_110_122_out;
wire hetero_CMP_EQ_1_110_124_out;
wire hetero_AND_IF_19_108_out;
wire hetero_COMBO_18_77_out;
wire hetero_IF_OR_76_79_out;
wire hetero_COMBO_18_81_out;
wire hetero_IF_OR_80_83_out;
wire hetero_REGISTER_7_126_out;
wire hetero_CMP_EQ_1_111_out;
wire hetero_BINARY_ADD_2_0;
wire hetero_BINARY_ADD_2_1;
wire hetero_BINARY_ADD_2_2;
wire hetero_BINARY_ADD_2_3;
wire hetero_BINARY_ADD_2_4;
wire hetero_BINARY_ADD_2_5;
wire hetero_BINARY_ADD_2_6;
wire hetero_BINARY_ADD_2_7;
wire hetero_COMBO_18_78_out;
wire hetero_COMBO_18_82_out;
wire hetero_COMBO_18_86_out;
wire hetero_IF_OR_84_87_out;
wire hetero_REGISTER_7_127_out;
wire hetero_CMP_EQ_1_112_out;
wire hetero_CMP_EQ_1_110_119_out;
wire hetero_COMBO_18_90_out;
wire hetero_IF_OR_88_91_out;
wire hetero_REGISTER_7_128_out;
wire hetero_CMP_EQ_1_113_out;
wire hetero_COMBO_18_94_out;
wire hetero_IF_OR_92_95_out;
wire hetero_REGISTER_7_129_out;
wire hetero_CMP_EQ_1_114_out;
wire hetero_CMP_EQ_1_110_120_out;
wire hetero_CMP_EQ_1_110_123_out;
wire hetero_COMBO_18_98_out;
wire hetero_IF_OR_96_99_out;
wire hetero_REGISTER_7_130_out;
wire hetero_CMP_EQ_1_115_out;
wire hetero_COMBO_18_102_out;
wire hetero_IF_OR_100_103_out;
wire hetero_REGISTER_7_131_out;
wire hetero_CMP_EQ_1_116_out;
wire hetero_CMP_EQ_1_110_121_out;
wire hetero_COMBO_18_106_out;
wire hetero_IF_OR_104_107_out;
wire hetero_REGISTER_7_132_out;
wire hetero_CMP_EQ_1_117_out;
wire hetero_COMBO_18_85_out;
wire hetero_COMBO_18_89_out;
wire hetero_COMBO_18_93_out;
wire hetero_COMBO_18_97_out;
wire hetero_COMBO_18_101_out;
wire hetero_COMBO_18_105_out;
wire IF_NOT_4_out;
wire hetero_AND_IF_20_109_out;
wire hetero_CMP_EQ_0_133_out;
wire IF_NOT_6_out;

lpm_dff hetero_REGISTER_7_125 (.data(hetero_IF_OR_76_79_out),.clock(counter_clk),.sset(counter_reset),.q(hetero_REGISTER_7_125_out));
defparam hetero_REGISTER_7_125.lpm_width = 1;
assign counter_out[0] = hetero_REGISTER_7_125_out;


xnor hetero_CMP_EQ_1_110 (hetero_CMP_EQ_1_110_out, hetero_REGISTER_7_125_out, gnd);


and hetero_CMP_EQ_1_110_118 (hetero_CMP_EQ_1_110_118_out, hetero_CMP_EQ_1_110_out, hetero_CMP_EQ_1_111_out);


and hetero_CMP_EQ_1_110_122 (hetero_CMP_EQ_1_110_122_out, hetero_CMP_EQ_1_110_118_out, hetero_CMP_EQ_1_110_119_out);


and hetero_CMP_EQ_1_110_124 (hetero_CMP_EQ_1_110_124_out, hetero_CMP_EQ_1_110_122_out, hetero_CMP_EQ_1_110_123_out);


and hetero_AND_IF_19_108 (hetero_AND_IF_19_108_out, hetero_CMP_EQ_1_110_124_out, IF_NOT_6_out);


and hetero_COMBO_18_77 (hetero_COMBO_18_77_out, gnd, hetero_AND_IF_19_108_out);


or hetero_IF_OR_76_79 (hetero_IF_OR_76_79_out, hetero_COMBO_18_77_out, hetero_COMBO_18_78_out);


and hetero_COMBO_18_81 (hetero_COMBO_18_81_out, gnd, hetero_AND_IF_19_108_out);


or hetero_IF_OR_80_83 (hetero_IF_OR_80_83_out, hetero_COMBO_18_81_out, hetero_COMBO_18_82_out);


lpm_dff hetero_REGISTER_7_126 (.data(hetero_IF_OR_80_83_out),.clock(counter_clk),.sset(counter_reset),.q(hetero_REGISTER_7_126_out));
defparam hetero_REGISTER_7_126.lpm_width = 1;
assign counter_out[1] = hetero_REGISTER_7_126_out;


xnor hetero_CMP_EQ_1_111 (hetero_CMP_EQ_1_111_out, hetero_REGISTER_7_126_out, vcc);

lpm_add_sub hetero_BINARY_ADD_2 (
	.dataa(
		{hetero_REGISTER_7_132_out,
		hetero_REGISTER_7_131_out,
		hetero_REGISTER_7_130_out,
		hetero_REGISTER_7_129_out,
		hetero_REGISTER_7_128_out,
		hetero_REGISTER_7_127_out,
		hetero_REGISTER_7_126_out,
		hetero_REGISTER_7_125_out}),
	.datab(
		{gnd,
		gnd,
		gnd,
		gnd,
		gnd,
		gnd,
		gnd,
		vcc}),
	.result(
		{hetero_BINARY_ADD_2_7,
		hetero_BINARY_ADD_2_6,
		hetero_BINARY_ADD_2_5,
		hetero_BINARY_ADD_2_4,
		hetero_BINARY_ADD_2_3,
		hetero_BINARY_ADD_2_2,
		hetero_BINARY_ADD_2_1,
		hetero_BINARY_ADD_2_0}));
defparam hetero_BINARY_ADD_2.lpm_direction = "ADD",
hetero_BINARY_ADD_2.lpm_width = 8,
hetero_BINARY_ADD_2.lpm_representation = "SIGNED",
hetero_BINARY_ADD_2.lpm_type = "LPM_ADD_SUB",
hetero_BINARY_ADD_2.use_wys = "ON",
hetero_BINARY_ADD_2.lpm_hint = "MAXIMIZE_SPEED=6";

and hetero_COMBO_18_78 (hetero_COMBO_18_78_out, hetero_BINARY_ADD_2_0, hetero_AND_IF_20_109_out);


and hetero_COMBO_18_82 (hetero_COMBO_18_82_out, hetero_BINARY_ADD_2_1, hetero_AND_IF_20_109_out);


and hetero_COMBO_18_86 (hetero_COMBO_18_86_out, hetero_BINARY_ADD_2_2, hetero_AND_IF_20_109_out);


or hetero_IF_OR_84_87 (hetero_IF_OR_84_87_out, hetero_COMBO_18_85_out, hetero_COMBO_18_86_out);


lpm_dff hetero_REGISTER_7_127 (.data(hetero_IF_OR_84_87_out),.clock(counter_clk),.sset(counter_reset),.q(hetero_REGISTER_7_127_out));
defparam hetero_REGISTER_7_127.lpm_width = 1;
assign counter_out[2] = hetero_REGISTER_7_127_out;


xnor hetero_CMP_EQ_1_112 (hetero_CMP_EQ_1_112_out, hetero_REGISTER_7_127_out, gnd);


and hetero_CMP_EQ_1_110_119 (hetero_CMP_EQ_1_110_119_out, hetero_CMP_EQ_1_112_out, hetero_CMP_EQ_1_113_out);


and hetero_COMBO_18_90 (hetero_COMBO_18_90_out, hetero_BINARY_ADD_2_3, hetero_AND_IF_20_109_out);


or hetero_IF_OR_88_91 (hetero_IF_OR_88_91_out, hetero_COMBO_18_89_out, hetero_COMBO_18_90_out);


lpm_dff hetero_REGISTER_7_128 (.data(hetero_IF_OR_88_91_out),.clock(counter_clk),.sset(counter_reset),.q(hetero_REGISTER_7_128_out));
defparam hetero_REGISTER_7_128.lpm_width = 1;
assign counter_out[3] = hetero_REGISTER_7_128_out;


xnor hetero_CMP_EQ_1_113 (hetero_CMP_EQ_1_113_out, hetero_REGISTER_7_128_out, vcc);


and hetero_COMBO_18_94 (hetero_COMBO_18_94_out, hetero_BINARY_ADD_2_4, hetero_AND_IF_20_109_out);


or hetero_IF_OR_92_95 (hetero_IF_OR_92_95_out, hetero_COMBO_18_93_out, hetero_COMBO_18_94_out);


lpm_dff hetero_REGISTER_7_129 (.data(hetero_IF_OR_92_95_out),.clock(counter_clk),.sset(counter_reset),.q(hetero_REGISTER_7_129_out));
defparam hetero_REGISTER_7_129.lpm_width = 1;
assign counter_out[4] = hetero_REGISTER_7_129_out;


xnor hetero_CMP_EQ_1_114 (hetero_CMP_EQ_1_114_out, hetero_REGISTER_7_129_out, gnd);


and hetero_CMP_EQ_1_110_120 (hetero_CMP_EQ_1_110_120_out, hetero_CMP_EQ_1_114_out, hetero_CMP_EQ_1_115_out);


and hetero_CMP_EQ_1_110_123 (hetero_CMP_EQ_1_110_123_out, hetero_CMP_EQ_1_110_120_out, hetero_CMP_EQ_1_110_121_out);


and hetero_COMBO_18_98 (hetero_COMBO_18_98_out, hetero_BINARY_ADD_2_5, hetero_AND_IF_20_109_out);


or hetero_IF_OR_96_99 (hetero_IF_OR_96_99_out, hetero_COMBO_18_97_out, hetero_COMBO_18_98_out);


lpm_dff hetero_REGISTER_7_130 (.data(hetero_IF_OR_96_99_out),.clock(counter_clk),.sset(counter_reset),.q(hetero_REGISTER_7_130_out));
defparam hetero_REGISTER_7_130.lpm_width = 1;
assign counter_out[5] = hetero_REGISTER_7_130_out;


xnor hetero_CMP_EQ_1_115 (hetero_CMP_EQ_1_115_out, hetero_REGISTER_7_130_out, gnd);


and hetero_COMBO_18_102 (hetero_COMBO_18_102_out, hetero_BINARY_ADD_2_6, hetero_AND_IF_20_109_out);


or hetero_IF_OR_100_103 (hetero_IF_OR_100_103_out, hetero_COMBO_18_101_out, hetero_COMBO_18_102_out);


lpm_dff hetero_REGISTER_7_131 (.data(hetero_IF_OR_100_103_out),.clock(counter_clk),.sset(counter_reset),.q(hetero_REGISTER_7_131_out));
defparam hetero_REGISTER_7_131.lpm_width = 1;
assign counter_out[6] = hetero_REGISTER_7_131_out;


xnor hetero_CMP_EQ_1_116 (hetero_CMP_EQ_1_116_out, hetero_REGISTER_7_131_out, gnd);


and hetero_CMP_EQ_1_110_121 (hetero_CMP_EQ_1_110_121_out, hetero_CMP_EQ_1_116_out, hetero_CMP_EQ_1_117_out);


and hetero_COMBO_18_106 (hetero_COMBO_18_106_out, hetero_BINARY_ADD_2_7, hetero_AND_IF_20_109_out);


or hetero_IF_OR_104_107 (hetero_IF_OR_104_107_out, hetero_COMBO_18_105_out, hetero_COMBO_18_106_out);


lpm_dff hetero_REGISTER_7_132 (.data(hetero_IF_OR_104_107_out),.clock(counter_clk),.sset(counter_reset),.q(hetero_REGISTER_7_132_out));
defparam hetero_REGISTER_7_132.lpm_width = 1;
assign counter_out[7] = hetero_REGISTER_7_132_out;


xnor hetero_CMP_EQ_1_117 (hetero_CMP_EQ_1_117_out, hetero_REGISTER_7_132_out, gnd);


and hetero_COMBO_18_85 (hetero_COMBO_18_85_out, gnd, hetero_AND_IF_19_108_out);


and hetero_COMBO_18_89 (hetero_COMBO_18_89_out, gnd, hetero_AND_IF_19_108_out);


and hetero_COMBO_18_93 (hetero_COMBO_18_93_out, gnd, hetero_AND_IF_19_108_out);


and hetero_COMBO_18_97 (hetero_COMBO_18_97_out, gnd, hetero_AND_IF_19_108_out);


and hetero_COMBO_18_101 (hetero_COMBO_18_101_out, gnd, hetero_AND_IF_19_108_out);


and hetero_COMBO_18_105 (hetero_COMBO_18_105_out, gnd, hetero_AND_IF_19_108_out);


not IF_NOT_4 (IF_NOT_4_out, hetero_CMP_EQ_1_110_124_out);


and hetero_AND_IF_20_109 (hetero_AND_IF_20_109_out, IF_NOT_4_out, IF_NOT_6_out);


xnor hetero_CMP_EQ_0_133 (hetero_CMP_EQ_0_133_out, counter_reset, gnd);


not IF_NOT_6 (IF_NOT_6_out, hetero_CMP_EQ_0_133_out);

endmodule
