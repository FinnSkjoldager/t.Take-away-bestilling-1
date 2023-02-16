<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('OrderNo');
            $table->integer('CustomerID');
            $table->string('PMethod');
            $table->integer('GTotal');
            $table->decimal('DeletedOrderItemIDs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
/*

INSERT [dbo].[Customer] ([CustomerID], [Name]) VALUES (
1, N'Olivia Kathleen')
2, N'Liam Patrick')
3, N'Charlotte Rose')
4, N'Elijah Burke ')
5, N'Ayesha Ameer')
6, N'Eva Louis')
INSERT [dbo].[Item] ([ItemID], [Name], [Price]) VALUES (
1, N'Chicken Tenders', CAST(3.50 AS Decimal(18, 2)))
2, N'Chicken Tenders w/ Fries', CAST(4.99 AS Decimal(18, 2)))
3, N'Chicken Tenders w/ Onion', CAST(5.99 AS Decimal(18, 2)))
4, N'Grilled Cheese Sandwich', CAST(2.50 AS Decimal(18, 2)))
5, N'Grilled Cheese Sandwich w/ Fries', CAST(3.99 AS Decimal(18, 2)))
6, N'Grilled Cheese Sandwich w/ Onion', CAST(4.99 AS Decimal(18, 2)))
7, N'Lettuce and Tomato Burger', CAST(1.99 AS Decimal(18, 2)))
8, N'Soup', CAST(2.50 AS Decimal(18, 2)))
9, N'Onion Rings', CAST(2.99 AS Decimal(18, 2)))
10, N'Fries', CAST(1.99 AS Decimal(18, 2)))
11, N'Sweet Potato Fries', CAST(2.49 AS Decimal(18, 2)))
12, N'Sweet Tea', CAST(1.79 AS Decimal(18, 2)))
13, N'Botttle Water', CAST(1.00 AS Decimal(18, 2)))
14, N'Canned Drinks', CAST(1.00 AS Decimal(18, 2)))
*/

