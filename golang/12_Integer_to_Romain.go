package main


import "fmt"

func intToRoman(num int) string {
	intArray := []int{0,0,0,0}
	tmpNum := num 
	romanString := ""
	intToRomanMap := map[int]string {
		1: "I",
		2: "II",
		3: "III",
		4: "IV",
		5: "V",
		6: "VI",
		7: "VII",
		8: "VIII",
		9: "IX",
		10: "X",
		20: "XX",
		30: "XXX",
		40: "XL",
		50: "L",
		60: "LX",
		70: "LXX",
		80: "LXXX",
		90: "XC",
		100: "C",
		200: "CC",
		300: "CCC",
		400: "CD",
		500: "D",
		600: "DC",
		700: "DCC",
		800: "DCCC",
		900: "CM",
		1000: "M",
	}
		
	intArray[0] = tmpNum / 1000
	tmpNum = tmpNum % 1000
	intArray[1] = (tmpNum / 100) * 100
	tmpNum = tmpNum % 100
	intArray[2] = (tmpNum / 10) * 10
	tmpNum = tmpNum % 10
	intArray[3] = tmpNum
	
	fmt.Println(intArray)
	
	
	if intArray[0] > 0 {
		for i:=intArray[0]; i > 0; i-- {
			romanString = romanString + intToRomanMap[1000]
		}
	}
	
	if intArray[1] > 0 {
		romanString = romanString + intToRomanMap[intArray[1]]
	}
	
	if intArray[2] > 0 {
		romanString = romanString + intToRomanMap[intArray[2]]
	}
	
	if intArray[3] > 0 {
		romanString = romanString + intToRomanMap[intArray[3]]
	}

    return romanString
}