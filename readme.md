Instruktioner för ReWear secondhand shop

För att se alla produkter:

localhost/rewear/?products

---

För att se alla säljare:

localhost/rewear/?sellers

---

För att se en säljare:

localhost/rewear?/sellerid={ID}

---

För att lägga till en användare:

I postman välj POST > Body > Raw > JSON

{
"firstname": "",
"lastname": "",
"email": "",
"phone": ""
}

Använd mallen ovan och fyll i info innanför citattecknen, tryck sedan på send.

---

För att lägga till en produkt:

I postman välj POST > Body > Raw > JSON

{
"seller_id": 0 ,
"category_id": 0 ,
"brand_id": 0,
"color_id": 0,
"size_id": 0,
"description": "",
"price": 0
}

Seller_id, se localhost/rewear/?sellers

category_id:

1. T-shirt,
2. Sweatshirt,
3. Dress,
4. Shirt,
5. Jeans,
6. Shoe,
7. Jacket,
8. Skirt,
9. Hoodie,
10. Swim Trunks.

brand_id:

1. H&M,
2. Uniqlo,
3. COS,
4. A days march,
5. Tommy Hilfiger,
6. Replay,
7. Björn Borg,
8. Calvin Klein,
9. Peak Performance,
10. Hugo Boss,
11. Nike,
12. Adidas.

color_id:

1. Black,
2. White,
3. Red,
4. Blue,
5. Green,
6. Grey,
7. Pink,
8. Darkblue.

size_id:

1. XS,
2. S,
3. M,
4. L,
5. XL.

---

För att ändra status till såld.

Se localhost/rewear/?products för id.

I postman välj PUT > Body > Raw > JSON

Sätt in id't på produkten du vill ändra till såld nedan.

{
"id": 0
}
