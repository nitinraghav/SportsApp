#include <iostream>
using namesapce std;

int main (){
double numbers [3];
int pos_large, pos_small;
// input 3.7, -2.6, 3.9
cin >> numbers [0] >> numbers [1] >> numbers [2]

if (numbers [0]> numbers [1] && numbers [0] > numbers [2]){
		numbers [0] = pos_large;
}
	else{
		if (numbers [1] > numbers [2]{
			numbers [1] = pos_large;
			
		}
		else {
			numbers [2] = pos_large;
		}
	}


cout << "the position of the largest is: ";
cout << pos_large <<endl;

return 0;
}