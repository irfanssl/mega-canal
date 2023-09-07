import axios from 'axios'
import * as bootstrap from 'bootstrap'

const showProducts = document.querySelector('#showProducts')
const loadMore = document.querySelector('#loadMore')
const productsTable = document.querySelector('#productsTable')
let modal = document.querySelector('#myModal')
let limit = 4
let skip = 0
let selectedProduct = null

showProducts.addEventListener('click', ()=>{
    fetch(limit, skip)
})
loadMore.addEventListener('click', ()=>{
    skip+=4
    fetch(limit, skip)
})



let fetch = (limit, skip)=> {
    axios.get(`https://dummyjson.com/products?limit=${limit}&skip=${skip}`)
      .then(function (response) {
        // console.log(response)
        drawTable(response)
        showProducts.setAttribute("disabled", "disabled")
        loadMore.classList.remove('d-none')
      })
      .catch(function (error) {
        console.log(error)
      })
}

let drawTable = (response)=> {
    if(response.data){
        if(response.data.products){
            if(response.data.products.length > 0){
                
                for(let i = 0; i < response.data.products.length; i++){
            
                    // ----------------- convert string into HTML DOM without Jquery -------------------
                    let stringToHtml = (html) => {
                        let temp = document.createElement('template')
                        temp.innerHTML = html
                        return temp.content.childNodes
                    }
                    let htmlElement = stringToHtml(
                    `<tr>
                        <td>
                            <img src="${response.data.products[i].thumbnail}" alt="${response.data.products[i].title} picture" style="width: 180px; height: 150px">
                        </td>
                        <td>${response.data.products[i].title}</td>
                        <td class="text-center">${response.data.products[i].category}</td>
                        <td class="text-center">${response.data.products[i].brand}</td>
                        <td class="text-end">${response.data.products[i].stock}</td>
                        <td class="text-end">$ ${response.data.products[i].price}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary" id="viewProduct-${response.data.products[i].id}">View</button>
                        </td>
                    </tr>`)
                     // ----------------- end of convert -------------------
                    productsTable.appendChild(htmlElement[0]) // it must index : 0
                    

                    document.querySelector(`#viewProduct-${response.data.products[i].id}`)
                        .addEventListener('click', ()=>{
                            selectedProduct = response.data.products[i]
                            // console.log('clicked product = ' + productId)
                            
                            modal = document.querySelector('#myModal')
                            if(modal){
                                if(modal.children){
                                    if(modal.children.length > 0){
                                        modal.children[0].remove()
                                    }
                                }
                            }

                            drawModal(selectedProduct)
                            modal = new bootstrap.Modal('#myModal', {
                                keyboard: false
                            })
                            modal.show()
                        })
                }

            }
        }
    }
}


let drawModal = (selectedProduct) =>{
    let image = images(selectedProduct)
    
    if(selectedProduct){
        let stringToHtml = (html) => {
            let temp = document.createElement('template')
            temp.innerHTML = html
            return temp.content.childNodes
        }
        let htmlElement = stringToHtml(
            `<div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="myModalLabel">${selectedProduct.title}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-7">
                            <div class="row">
                                <div class="col">
                                    <img src="${selectedProduct.thumbnail}" id="image-full" alt="" style="width: 100%; height: 100%">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="overflow: auto; white-space: nowrap; padding: 10px;">
                                    ${image}
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <table>
                                    <tr>
                                        <td><h4>Price : $${selectedProduct.price}</h4></td>
                                        <td>bintang</td>
                                    </tr>
                                    <tr>
                                        <td>Category : ${selectedProduct.category}</td>
                                        <td>Brand : ${selectedProduct.brand}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Stock : ${selectedProduct.stock}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Description :</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">${selectedProduct.description}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`)
        modal.appendChild(htmlElement[0]) // it must index : 0


        
        if(selectedProduct.images.length > 0){
            selectedProduct.images.forEach(element => {
                image = element.replace(`https://i.dummyjson.com/data/products/${selectedProduct.id}/`, '')
                image = image.replace(/\D/g, '') // replace everything except numeric
                // console.log(`picture-product-${selectedProduct.id}-${image}`)

                document.querySelector(`#picture-product-${selectedProduct.id}-${image}`)
                            .addEventListener('click', ()=>{
                                document.querySelector("#image-full")
                                    .setAttribute('src', element)
                            })
            });
        }else{
            console.log(
                'image null'
            )
        }


    }
}

let images = (data)=>{
    let string = ''
    if(data.images){
        if(data.images.length > 0){
            data.images.forEach(element => {
                let image = element.replace(`https://i.dummyjson.com/data/products/${data.id}/`, '')
                image = image.replace(/\D/g, '')  // replace everything except numeric
                string+= `<img src="${element}" alt="${data.title} picture" id="picture-product-${data.id}-${image}" style="width: 150px; height: 90px; padding: 10px;"></img>`
                // console.log(`picture-product-${data.id}-${image}`)
                
            });
        }else{
            string += `<img src="#" alt="picture" style="width: 150px; height: 90px; padding: 10px;"></img>`
        }
        return string
    }
}