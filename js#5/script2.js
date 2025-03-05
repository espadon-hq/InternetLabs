class Vehicle {
    constructor(make, model, year) {
        this.make = make;
        this.model = model;
        this.year = year;
    }

    getInfo() {
        return `${this.make} ${this.model}, ${this.year}`;
    }

    getMaintenanceCost() {
        throw new Error('Method must be implemented in subclasses');
    }

    static getCurrentYear() {
        return new Date().getFullYear();
    }
}

class Car extends Vehicle {
    constructor(make, model, year, numberOfDoors) {
        super(make, model, year);
        this.numberOfDoors = numberOfDoors;
    }

    getInfo() {
        return `${super.getInfo()}, doors: ${this.numberOfDoors}`;
    }

    getMaintenanceCost() {
        const age = Vehicle.getCurrentYear() - this.year;
        return 1000 + age * 200;
    }
}

class Motorcycle extends Vehicle {
    constructor(make, model, year, type) {
        super(make, model, year);
        this.type = type;
    }

    getInfo() {
        return `${super.getInfo()}, type: ${this.type}`;
    }

    getMaintenanceCost() {
        const age = Vehicle.getCurrentYear() - this.year;
        return 500 + age * 100;
    }
}

class Garage {
    constructor() {
        this.vehicles = [];
    }

    addVehicle(vehicle) {
        this.vehicles.push(vehicle);
    }

    getTotalMaintenanceCost() {
        return this.vehicles.reduce((sum, vehicle) => sum + vehicle.getMaintenanceCost(), 0);
    }

    displayGarageInfo() {
        this.vehicles.forEach(vehicle => console.log(vehicle.getInfo()));
    }
}

const garage = new Garage();

garage.addVehicle(new Car('Toyota', 'Camry', 2018, 4));
garage.addVehicle(new Motorcycle('Yamaha', 'R1', 2020, 'sportbike'));

console.log('Garage information:');
garage.displayGarageInfo();

console.log('Total maintenance cost:', garage.getTotalMaintenanceCost());
