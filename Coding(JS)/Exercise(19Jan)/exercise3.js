var arr = [{
        name: 'Hemang',
        age: 20,
        phone: 9876543210
    },
    {
        name: 'ram',
        age: 18,
        phone: 9876543210,
    },
    {
        name: 'syam',
        age: 15,
        phone: 9876543210,
    }
]
arr.sort(function(a, b) {

    return a.age - b.age;
})
console.log(arr)