import { layouts } from "./layouts";
import modelsInventory from './paths';

export default () => [
    ...modelsInventory(layouts)
]
