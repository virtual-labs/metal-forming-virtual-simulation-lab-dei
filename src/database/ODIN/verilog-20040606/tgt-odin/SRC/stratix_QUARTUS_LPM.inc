gate_library_implementations ql_library_implementation[]={
// ZERO
	{ 	"gnd" , QL_SIGNAL,
		0, NULL, 0, NULL,
		NULL, FALSE, 
		ZERO, ZERO, ZERO
	} ,
// ONE
	{ 	"vcc", QL_SIGNAL,
		0, NULL, 0, NULL,
		NULL, FALSE,
		ONE, ONE, ONE
	},
// NOT
	{ 	"not" , QL_LOGIC,
		1, NULL, 1, NULL,
		NULL, FALSE,
		ONE, ZERO, X
	},
// AND
	{ "and" , QL_LOGIC, // 2 input and
		2, NULL, 1, NULL,
		NULL, FALSE,
		ZERO, X, X
	},
// OR
	{ "or" , QL_LOGIC, // 2 input or
		2, NULL, 1, NULL,
		NULL, FALSE,
		X, ONE, X
	},
// NAND
	{ "nand" , QL_LOGIC, // 2 input nand
		2, NULL, 1, NULL,
		NULL, FALSE,
		ONE, X, X
	},
// NOR
	{ "nor" , QL_LOGIC, // 2 input nor
		2, NULL, 1, NULL,
		NULL, FALSE,
		X, ZERO, X
	},
// XOR
	{ "xor" , QL_LOGIC, // 2 input xor
		2, NULL, 1, NULL,
		NULL, FALSE,
		X, X, X
	},
// XNOR
	{ "xnor" , QL_LOGIC, // 2 input xnor
		2, NULL, 1, NULL,
		NULL, FALSE,
		X, X, X
	},
// 2:1 MUX
	{ "two_one_mux" , QL_DEFINITION,
		3, (char *[]){"a", "b", "sel"}, 1, (char *[]){"o"},
//		(char []){"module two_one_mux(o,a,b,sel);\ninput a,b,sel;\noutput o;\nwire z1,z2,z3;\nnot(z1,sel);\nand(z2,a,sel);\nand(z3,b,z1);\nor(o,z2,z3);\nendmodule\n"}, 
		(char []){"module two_one_mux(o,a,b,sel);\ninput a,b,sel; \noutput o; \nlpm_mux local(.sel(sel),.data({a,b}),.result(o));\ndefparam\nlocal.lpm_size=2,\nlocal.lpm_widths=1,\nlocal.lpm_width=1,\nlocal.lpm_type=\"LPM_MUX\";\nendmodule\n"}, 
		FALSE,
		X, X, X
	},
// Flip Flop
	{ "dff" , QL_DFF,
		2, (char *[]){"d", "clk"}, 1, (char *[]){"q"},
		NULL, FALSE,
		ZERO, ONE, X
	},
// Flip Flop
	{ "dffr" , QL_DFF,
		3, (char *[]){"d", "clk", "sset"}, 1, (char *[]){"q"},
		NULL, FALSE,
		ZERO, ONE, X
	},
// BUFZ
	{ "buf", QL_LOGIC,
		1, NULL, 1, NULL,
		NULL, FALSE,
		ZERO, ONE, X
	},
// BUF
	{ "buf", QL_LOGIC,
		1, NULL, 1, NULL,
		NULL, FALSE,
		ZERO, ONE, X
	},
// CMP_EQ
	{ "xnor" , QL_LOGIC, // 2 input xor
		2, NULL, 1, NULL,
		NULL, FALSE,
		X, X, X
	},
// CMP_GT
	{ "cmp_gt" , QL_DEFINITION, // 2 input greater than
		2, (char *[]){"a", "b"}, 1, (char *[]){"o"},
		(char []){"module cmp_gt(o, a, b);\ninput a, b;\noutput o;\nwire z1,z2;\nnot(z1,b);\nand(z2,a,a);\nand(o,z2,z1);\nendmodule\n"}, 
		FALSE,
		X, X, X
	},
// Latch
	{ "dff" , QL_DFF,
		2, (char *[]){"d", "clk"}, 1, (char *[]){"q"},
		NULL, FALSE,
		ZERO, ONE, X
	},
// ADDC
	{ "addc", QL_DEFINITION,
		3, (char *[]){"x", "y", "Cin"}, 2, (char*[]){"s", "Cout"},
		(char []){"module addc(s,Cout,x,y,Cin);\ninput x,y,Cin;\noutput s,Cout;\nwire z1,z2,z3;\nxor(s,x,y,Cin);\nand(z1,x,y);\nand(z2,x,Cin);\nand(z3,y,Cin);\nor(Cout,z1,z2,z3);\nendmodule\n"}, 
		FALSE,
		X, X, X
	}
};

gate_library_implementations blif_imp[]={
// ZERO
	{ 	"gnd" , QL_SIGNAL,
		0, NULL, 0, NULL,
		NULL, FALSE, 
		ZERO, ZERO, ZERO
	} ,
// ONE
	{ 	"vcc", QL_SIGNAL,
		0, NULL, 0, NULL,
		NULL, FALSE,
		ONE, ONE, ONE
	},
// NOT
	{ 	"not" , QL_LOGIC,
		1, NULL, 1, NULL,
		"0 1\n", TRUE,
		ONE, ZERO, X
	},
// AND
	{ "and" , QL_LOGIC, // 2 input and
		2, NULL, 1, NULL,
		"11 1\n", TRUE,
		ZERO, X, X
	},
// OR
	{ "or" , QL_LOGIC, // 2 input or
		2, NULL, 1, NULL,
		"01 1\n10 1\n11 1\n", TRUE,
		X, ONE, X
	},
// NAND
	{ "nand" , QL_LOGIC, // 2 input nand
		2, NULL, 1, NULL,
		"00 1\n01 1\n10 1\n", TRUE,
		ONE, X, X
	},
// NOR
	{ "nor" , QL_LOGIC, // 2 input nor
		2, NULL, 1, NULL,
		"00 1\n", TRUE,
		X, ZERO, X
	},
// XOR
	{ "xor" , QL_LOGIC, // 2 input xor
		2, NULL, 1, NULL,
		"01 1\n10 1\n", TRUE,
		X, X, X
	},
// XNOR
	{ "xnor" , QL_LOGIC, // 2 input xnor
		2, NULL, 1, NULL,
		"00 1\n11 1\n", TRUE,
		X, X, X
	},
// 2:1 MUX
	{ "two_one_mux" , QL_LOGIC,
		3, (char *[]){"a", "b", "sel"}, 1, (char *[]){"o"},
		"01- 1\n1-1 1\n", TRUE,
		X, X, X
	},
// Flip Flop
	{ "dff" , QL_DFF,
		2, (char *[]){"d", "clk"}, 1, (char *[]){"q"},
		NULL, FALSE,
		ZERO, ONE, X
	},
// Flip Flop
	{ "dffr" , QL_DFF,
		3, (char *[]){"d", "clk", "sset"}, 1, (char *[]){"q"},
		NULL, FALSE,
		ZERO, ONE, X
	},
// BUFZ
	{ "buf", QL_LOGIC,
		1, NULL, 1, NULL,
		"1 1\n", TRUE,
		ZERO, ONE, X
	},
// BUF
	{ "buf", QL_LOGIC,
		1, NULL, 1, NULL,
		"1 1\n", TRUE,
		ZERO, ONE, X
	},
// CMP_EQ
	{ "xnor" , QL_LOGIC, // 2 input xor
		2, NULL, 1, NULL,
		"00 1\n11 1\n", TRUE,
		X, X, X
	},
// CMP_GT
	{ "cmp_gt" , QL_LOGIC, // 2 input greater than
		2, (char *[]){"a", "b"}, 1, (char *[]){"o"},
		"10 1\n", TRUE,
		X, X, X
	},
// Latch
	{ "dff" , QL_DFF,
		2, (char *[]){"d", "clk"}, 1, (char *[]){"q"},
		NULL, FALSE,
		ZERO, ONE, X
	},
// ADDC
	{ "add", QL_LOGIC,
		3, (char *[]){"x", "y", "Cin"}, 2, (char*[]){"s"},
		"001 1\n010 1\n100 1\n111 1\n", TRUE,
		X, X, X
	},
// CARRY OF ADDC
	{ "carry", QL_LOGIC,
		3, (char *[]){"x", "y", "Cin"}, 2, (char*[]){"Cout"},
		"011 1\n101 1\n110 1\n111 1\n", TRUE,
		X, X, X
	}
};
