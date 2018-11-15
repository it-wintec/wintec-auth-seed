import { CustomMaterialModule } from './custom-material.module';

describe('CustomMaterialModule', () => {
  let customMaterialModule: CustomMaterialModule;

  beforeEach(() => {
    customMaterialModule = new CustomMaterialModule();
  });

  it('should create an instance', () => {
    expect(customMaterialModule).toBeTruthy();
  });
});
