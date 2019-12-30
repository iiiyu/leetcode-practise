package main

import "fmt"

//func isMatchHere(sArray []rune, pArray []rune) bool {
//	if len(pArray) == 0 {
//		if len(sArray) > 0 {
//			return false
//		} else {
//			return true
//		}
//	}
//	if len(pArray) > 1 && pArray[1] == '*' {
//		return isMatchStar(pArray[0], sArray, pArray[2:])
//	}
//	//    if(pArray[0] == '$' && len(pArray) == 1) {
//	//        return len(sArray) == 0
//	//    }
//
//	if len(sArray) > 0 && (pArray[0] == '.' || pArray[0] == sArray[0]) {
//		return isMatchHere(sArray[1:], pArray[1:])
//	}
//
//	return false
//}
//
//func isMatchStar(c rune, sArray []rune, pArray []rune) bool {
//	// * 匹配到最后
//	if len(sArray) == 0 && len(pArray) == 0 {
//		return true
//	}
//
//	for ok := true; ok; ok = (len(sArray) > 0) {
//		fmt.Println("fuck:" + string(sArray) + " " + string(pArray) )
//		// 如果 * 是最后一个需要把它匹配完
//		if len(pArray) == 0 {
//			if len(sArray) > 0 && (sArray[0] == c || c == '.') {
//				sArray = sArray[1:]
//				if len(sArray) == 0 {
//					return true
//				}
//			}
//		} else {
//			if len(sArray) > 0 && (sArray[0] == c || c == '.') {
//				sArray = sArray[1:]
//			} else  {
//				if isMatchHere(sArray, pArray) {
//					return true
//				}
//			}
//		}
//	}
//	return false
//}
//
//func isMatch(s string, p string) bool {
//	sArray := []rune(s)
//	pArray := []rune(p)
//	//    if pArray[0] == '^' {
//	//        return isMatchHere(sArray, pArray[1:])
//	//    }
//	for ok := true; ok; ok = !(len(sArray) > 0) {
//		if isMatchHere(sArray, pArray) {
//			return true
//		}
//		sArray = sArray[1:]
//	}
//	return false
//}

//func isMatchHere(sArray []rune, pArray []rune, c rune) bool {
////			fmt.Println(sArray)
//	if len(sArray) == 0 && len(pArray) == 0 {
//		fmt.Println("fuck")
//		return true
//	}
//
//	if len(sArray) == 1 && len(pArray) == 0 && (sArray[0] == c || c == '.') {
//				return true
//	}
//	
//	if len(pArray) == 0 && len(sArray) > 0 {
//		return false
//	}
//
//	if len(pArray) > 1 && pArray[1] == '*' {
////		fmt.Println(string(sArray))
////		fmt.Println(string(pArray))
//		return isMatchStar(sArray, pArray[2:], pArray[0])
//	}
//
//	//	if len(pArray) == 0 && c != ' ' {
//	//		return isMatchStar(sArray, pArray, c)
//	//	}
//	//
//	//	return false
//
//
//	
//	if len(sArray) > 0 && (pArray[0] == '.' || pArray[0] == sArray[0]) {
////		fmt.Println(string(sArray))
////		fmt.Println(string(pArray))
//		return isMatchHere(sArray[1:], pArray[1:], ' ')
//	}
//
//	return false
//}
//
//func isMatchStar(sArray []rune, pArray []rune, c rune) bool {
//	for ok := true; ok; ok = (len(sArray) > 0) {
//		fmt.Println(string(sArray))
//		fmt.Println(string(pArray))
//		
//		if isMatchHere(sArray, pArray, c) {
//			return true
//		}
//
//		if len(sArray) > 0 && (sArray[0] == c || c == '.') {
//			sArray = sArray[1:]
//		} else {
//			return false
//		}
//	}
//	return false
//}
//
//func isMatch(s string, p string) bool {
//	sArray := []rune(s)
//	pArray := []rune(p)
//	//    if pArray[0] == '^' {
//	//        return isMatchHere(sArray, pArray[1:])
//	//    }
//	
//	if len(pArray) == 0 && len(sArray) > 0  {
//		return false
//	}
//	for ok := true; ok; ok = !(len(sArray) > 0) {
//		if isMatchHere(sArray, pArray, ' ') {
//			return true
//		}
//		if len(sArray) > 0 { 
//		  sArray = sArray[1:]
//		} else {
//			return false
//		}
//	}
//	return false
//}

func isMatch(s string, p string) bool {
	if len(p) == 0 {
		return len(s) == 0
	}
	first := (len(s) > 0 && (p[0] == s[0] || p[0] == '.'))	
	if (len(p) >= 2 && p[1] == '*') {
		return isMatch(s, p[2:]) || (first && isMatch(s[1:], p))
	} else {
		return (first && isMatch(s[1:], p[1:]))
	}
}