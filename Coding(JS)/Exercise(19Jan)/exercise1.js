const detail={
    name:'hv',
    age:15,
    city:'rajkot',
}

for(const key in detail){
    if(Object.hasOwnProperty.call(detail,key)){
        const value=detail[key];
        console.log(value);
    }
}