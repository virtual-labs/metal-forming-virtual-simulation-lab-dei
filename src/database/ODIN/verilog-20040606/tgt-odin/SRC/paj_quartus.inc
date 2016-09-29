library_cell paj_quartus_library[]={
	{ "ZERO" , "GND", "GND",
		"\t\t(cell GND (cellType GENERIC) (view GND (viewType NETLIST)"
            	" (interface (port out (direction OUTPUT))"
            	" )))\n",
		1,
		(char *[]){ "out" } ,
		1},
	{ "ONE" , "VCC", "VCC",
		"\t\t(cell VCC (cellType GENERIC) (view VCC (viewType NETLIST)"
            	" (interface (port out (direction OUTPUT))"
            	" )))\n",
		1,
		(char *[]){ "out" } ,
		1},
	{ "NOT" , "INV", "INV",
		"\t\t(cell INV (cellType GENERIC) (view INV (viewType NETLIST)"
            	" (interface (port in (direction INPUT)) (port out (direction OUTPUT))"
            	" )))\n",
		2,
		(char *[]){ "out", "in"} ,
		1},
	{ "AND" , "AN2", "AN2",
		"\t\t(cell AN2 (cellType GENERIC) (view AN2 (viewType NETLIST)"
            	" (interface (port in0 (direction INPUT)) (port in1 (direction INPUT)) (port out (direction OUTPUT))"
            	" )))\n",
		3,
		(char *[]){ "out", "in0", "in1" } ,
		1},
	{ "OR" , "OR2", "OR2",
		"\t\t(cell OR2 (cellType GENERIC) (view OR2 (viewType NETLIST)"
            	" (interface (port in0 (direction INPUT)) (port in1 (direction INPUT)) (port out (direction OUTPUT))"
            	" )))\n",
		3,
		(char *[]){ "out", "in0", "in1" } ,
		1},
	{ "NAND" , "NA2", "NA2",
		"\t\t(cell NA2 (cellType GENERIC) (view NA2 (viewType NETLIST)"
            	" (interface (port in0 (direction INPUT)) (port in1 (direction INPUT)) (port out (direction OUTPUT))"
            	" )))\n",
		3,
		(char *[]){ "out", "in0", "in1" } ,
		1},
	{ "NOR" , "NO2", "NO2",
		"\t\t(cell NO2 (cellType GENERIC) (view NO2 (viewType NETLIST)"
            	" (interface (port in0 (direction INPUT)) (port in1 (direction INPUT)) (port out (direction OUTPUT))"
            	" )))\n",
		3,
		(char *[]){ "out", "in0", "in1" } ,
		1},
	{ "XOR" , "XO2", "XO2",
		"\t\t(cell XO2 (cellType GENERIC) (view XO2 (viewType NETLIST)"
            	" (interface (port in0 (direction INPUT)) (port in1 (direction INPUT)) (port out (direction OUTPUT))"
            	" )))\n",
		3,
		(char *[]){ "out", "in0", "in1" } ,
		1},
	{ "XNOR" , "XNO2", "XNO2",
		"\t\t(cell XNO2 (cellType GENERIC) (view XNO2 (viewType NETLIST)"
            	" (interface (port in0 (direction INPUT)) (port in1 (direction INPUT)) (port out (direction OUTPUT))"
            	" )))\n",
		3,
		(char *[]){ "out", "in0", "in1" } ,
		1},

	{ "MUX" , "MUX2", "MUX2",
		"\t\t(cell MUX2 (cellType GENERIC) (view MUX2 (viewType NETLIST)"
            	" (interface (port in0 (direction INPUT)) (port in1 (direction INPUT)) (port sel (direction INPUT)) (port out (direction OUTPUT))"
            	" )))\n",
		4,
		(char *[]){ "out", "in0", "in1", "sel" } ,
		1},
	{ "DFF" , "DFF", "DFF",
		"\t\t(cell DFF (cellType GENERIC) (view DFF (viewType NETLIST)"
            	" (interface\n"
		"\t\t\t(port in (direction INPUT))\n"
		"\t\t\t(port clk (direction INPUT))\n"
		"\t\t\t(port out (direction OUTPUT)))\n"
		"\t\t\t))\n",
		3,
		(char *[]){ "out", "in", "clk"} ,
		1},
	{ "DFFR" , "DFFR", "DFFR",
		"\t\t(cell DFFR (cellType GENERIC) (view DFFR (viewType NETLIST)"
            	" (interface\n"
		"\t\t\t(port in (direction INPUT))\n"
		"\t\t\t(port clk (direction INPUT))\n"
		"\t\t\t(port sset (direction INPUT)))\n"
		"\t\t\t(port out (direction OUTPUT)))\n"
		"\t\t\t))\n",
		4,
		(char *[]){ "out", "in", "clk", "sset"} ,
		1},
	{ "BUFZ", "BUFZ", "BUFZ",
		"\t\t(cell BUFZ (cellType GENERIC) (view BUFZ (viewType NETLIST)"
		" (interface (port A (direction INPUT)) (port PAD (direction OUTPUT))"
		" )))\n",
		2,
		(char *[]){"PAD", "A"},
		1},
	{ "BUF", "BUF", "BUF",
		"\t\t(cell BUF (cellType GENERIC) (view BUF (viewType NETLIST)"
		" (interface (port A (direction INPUT)) (port PAD (direction OUTPUT)))\n"
		"\t\t(contents\n"
		"\t\t\t(instance BUFFER (viewRef BUFZ (cellRef BUFZ)))\n"
		"\t\t\t(net BUF_IN(joined\n"
		"\t\t\t\t(portRef A)\n"
		"\t\t\t\t(portRef A (instanceRef BUFFER))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net BUF_OUT(joined\n"
		"\t\t\t\t(portRef PAD (instanceRef BUFFER))\n"
		"\t\t\t\t(portRef PAD)\n"
		"\t\t\t\t))\n"
        "\t\t)))\n",
		2,
		(char *[]){"PAD", "A"},
		1},

	{ "CMP_EQ" , "CMP_E2", "CMP_E2",
		"\t\t(cell CMP_E2 (cellType GENERIC) (view CMP_E2 (viewType NETLIST)"
            	" (interface (port in0 (direction INPUT)) (port in1 (direction INPUT)) (port out (direction OUTPUT))"
            	" )))\n",
		3,
		(char *[]){ "out", "in0", "in1" } ,
		1},
	{ "CMP_GT" , "CMP_GT2", "CMP_GT2",
		"\t\t(cell CMP_GT2 (cellType GENERIC) (view CMP_GT2 (viewType NETLIST)"
            	" (interface (port in0 (direction INPUT)) (port in1 (direction INPUT)) (port out (direction OUTPUT))"
            	" )))\n",
		3,
		(char *[]){ "out", "in0", "in1" } ,
		1},
	{ "DLatch" , "DLatch", "DLatch",
		"\t\t(cell DLatch (cellType GENERIC) (view DLatch (viewType NETLIST)\n"
            	"\t\t\t(interface (port D (direction INPUT)) (port CLK (direction INPUT)) (port Q (direction OUTPUT)))"
		"\t\t(contents\n"
		"\t\t\t(instance NAND1 (viewRef AN2 (cellRef AN2)))\n"
		"\t\t\t(instance NAND2 (viewRef AN2 (cellRef AN2)))\n"
		"\t\t\t(instance NAND3 (viewRef AN2 (cellRef AN2)))\n"
		"\t\t\t(instance NAND4 (viewRef AN2 (cellRef AN2)))\n"
		"\t\t\t(instance NOT (viewRef INV (cellRef INV)))\n"
		"\t\t\t(net DS_NAND1(joined\n"
		"\t\t\t\t(portRef D)\n"
		"\t\t\t\t(portRef in0 (instanceRef NAND1))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net CLK_NAND1 (joined\n"
		"\t\t\t\t(portRef CLK)\n"
		"\t\t\t\t(portRef in1 (instanceRef NAND1))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net DNOT (joined\n"
		"\t\t\t\t(portRef D)\n"
		"\t\t\t\t(portRef in (instanceRef NOT))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net DNOT_NAND2 (joined\n"
		"\t\t\t\t(portRef out (instanceRef NOT))\n"
		"\t\t\t\t(portRef in0 (instanceRef NAND2))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net CLK_NAND2 (joined\n"
		"\t\t\t\t(portRef CLK)\n"
		"\t\t\t\t(portRef in1 (instanceRef NAND2))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net NAND1_NAND3 (joined\n"
		"\t\t\t\t(portRef out (instanceRef NAND1))\n"
		"\t\t\t\t(portRef in0 (instanceRef NAND3))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net NAND2_NAND4 (joined\n"
		"\t\t\t\t(portRef out (instanceRef NAND2))\n"
		"\t\t\t\t(portRef in0 (instanceRef NAND4))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net NAND3_NAND4 (joined\n"
		"\t\t\t\t(portRef out (instanceRef NAND3))\n"
		"\t\t\t\t(portRef in1 (instanceRef NAND4))\n"
		"\t\t\t\t(portRef Q)\n"
		"\t\t\t\t))\n"
		"\t\t\t(net NAND4_NAND3 (joined\n"
		"\t\t\t\t(portRef out (instanceRef NAND4))\n"
		"\t\t\t\t(portRef in1 (instanceRef NAND3))\n"
		"\t\t\t\t))\n"
        "\t\t)))\n",
		3,
		(char *[]){ "Q", "D", "CLK" } ,
		1},

	{ "ADDC", "FA", "FA",
		"\t\t(cell FA (cellType GENERIC) (view FA (viewType NETLIST)"
            	" (interface\n"
		"\t\t\t(port in0 (direction INPUT))\n"
		"\t\t\t(port in1 (direction INPUT))\n"
		"\t\t\t(port CI (direction INPUT))\n"
		"\t\t\t(port SUM (direction OUTPUT))\n"
		"\t\t\t(port COUT (direction OUTPUT)))\n"
		"\t\t(contents\n"
		"\t\t\t(instance XORS_0 (viewRef XO2 (cellRef XO2)))\n"
		"\t\t\t(instance XORS_1 (viewRef XO2 (cellRef XO2)))\n"
		"\t\t\t(instance ORS_0 (viewRef OR2 (cellRef OR2)))\n"
		"\t\t\t(instance ORS_1 (viewRef OR2 (cellRef OR2)))\n"
		"\t\t\t(instance ANDS_0 (viewRef AN2 (cellRef AN2)))\n"
		"\t\t\t(instance ANDS_1 (viewRef AN2 (cellRef AN2)))\n"
		"\t\t\t(instance ANDS_2 (viewRef AN2 (cellRef AN2)))\n"
		"\t\t\t(net TOTAL_1 (joined\n"
		"\t\t\t\t(portRef in0)\n"
		"\t\t\t\t(portRef in0 (instanceRef XORS_0))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net TOTAL_2 (joined\n"
		"\t\t\t\t(portRef in1)\n"
		"\t\t\t\t(portRef in1 (instanceRef XORS_0))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net TOTAL_3 (joined\n"
		"\t\t\t\t(portRef out (instanceRef XORS_0))\n"
		"\t\t\t\t(portRef in0 (instanceRef XORS_1))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net TOTAL_4 (joined\n"
		"\t\t\t\t(portRef CI)\n"
		"\t\t\t\t(portRef in1 (instanceRef XORS_1))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net TOTAL_5 (joined\n"
		"\t\t\t\t(portRef out (instanceRef XORS_1))\n"
		"\t\t\t\t(portRef SUM)\n"
		"\t\t\t\t))\n"
		"\t\t\t(net COUT_1 (joined\n"
		"\t\t\t\t(portRef in0)\n"
		"\t\t\t\t(portRef in0 (instanceRef ANDS_0))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net COUT_2 (joined\n"
		"\t\t\t\t(portRef in1)\n"
		"\t\t\t\t(portRef in1 (instanceRef ANDS_0))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net COUT_3 (joined\n"
		"\t\t\t\t(portRef in0)\n"
		"\t\t\t\t(portRef in0 (instanceRef ANDS_1))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net COUT_4 (joined\n"
		"\t\t\t\t(portRef CI)\n"
		"\t\t\t\t(portRef in1 (instanceRef ANDS_1))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net COUT_5 (joined\n"
		"\t\t\t\t(portRef in1)\n"
		"\t\t\t\t(portRef in0 (instanceRef ANDS_2))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net COUT_6 (joined\n"
		"\t\t\t\t(portRef CI)\n"
		"\t\t\t\t(portRef in1 (instanceRef ANDS_2))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net COUT_7 (joined\n"
		"\t\t\t\t(portRef out (instanceRef ANDS_0))\n"
		"\t\t\t\t(portRef in0 (instanceRef ORS_0))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net COUT_8 (joined\n"
		"\t\t\t\t(portRef out (instanceRef ANDS_1))\n"
		"\t\t\t\t(portRef in1 (instanceRef ORS_0))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net COUT_9 (joined\n"
		"\t\t\t\t(portRef out (instanceRef ORS_0))\n"
		"\t\t\t\t(portRef in0 (instanceRef ORS_1))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net COUT_10 (joined\n"
		"\t\t\t\t(portRef out (instanceRef ANDS_2))\n"
		"\t\t\t\t(portRef in1 (instanceRef ORS_1))\n"
		"\t\t\t\t))\n"
		"\t\t\t(net COUT_11 (joined\n"
		"\t\t\t\t(portRef out (instanceRef ORS_1))\n"
		"\t\t\t\t(portRef COUT)))\n"
		"\t\t\t))\n"
		"\t\t)\n",
		5,
		(char *[]){ "SUM", "COUT", "in0", "in1", "CI"} ,
		2},

	{ NULL, NULL, NULL, NULL, 0, NULL, 0 } };
 
