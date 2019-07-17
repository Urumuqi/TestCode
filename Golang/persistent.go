package main

import (
    "fmt"
    "time"
)

func main() {
    for {
        fmt.Println("Infinite Loop 1")
        time.Sleep(time.Second)
    }

    // for true {
    //     fmt.Println("Infinite Loop 2")
    //     time.Sleep(time.Second)
    // }
}
