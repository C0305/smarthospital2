import { layouts } from "./layouts";
import brandsInventory from './paths/brandsInventory';
import modelsInventory from './paths/modelsInventory';

export default () => [
    ...modelsInventory(layouts),
    ...brandsInventory(layouts)

]
