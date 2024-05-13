@props([
"data",
])
<li x-data="{ 
                data: {{ $data}},
                open: false, 
                open(){
                this.open = true
            }, 
                close(){
                this.open = false
            }, 
        }" x-init=" data ? open() : close() ">
    {{$slot}}
</li>