<script>
var provinceApi = 'https://provinces.open-api.vn/api/p/'
var districtsApi = 'https://provinces.open-api.vn/api/d/'
var wardsApi = 'https://provinces.open-api.vn/api/w/'
var countryApi = 'https://restcountries.eu/rest/v2/all'

const province = document.getElementById('province')
const district = document.getElementById('district')
const ward = document.getElementById('ward')
const country = document.getElementById('country')

function CallApi(api,id){
    fetch(api)
      .then(response => response.json())
      .then(function(items){
        var htmls = items.map(function(item){
            return `<option>${item.name}</option>`
        })
        var html = htmls.join('')
        document.getElementById(id).innerHTML = html
      })
}

CallApi(provinceApi,'province')
CallApi(districtsApi,'district')
CallApi(wardsApi,'ward')
CallApi(countryApi,'country')

</script>