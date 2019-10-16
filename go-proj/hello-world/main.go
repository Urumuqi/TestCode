package main

import (
    "fmt"
)

func main () {
    fmt.Println("Hello, Golang")
    fmt.Println(f())
    // v := 2
    x, y := 1, 2
    x, y = y, x
    fmt.Println(x, y)
    // fmt.Println(printPointer(&v))
    t := 2
    fmt.Printf("%08b\n", t)
}

func f() *int {
    v := 2
    return &v
}

func printPointer(p *int) *int {
    *p ++
    return p
}