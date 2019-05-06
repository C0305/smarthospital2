import { layouts } from "./layouts";
import procedureTypes from './paths/procedures-types';

export default () => [
    ...procedureTypes(layouts)
]
